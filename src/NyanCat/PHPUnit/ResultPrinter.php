<?php

/*
 * This file is part of the Nyan Cat result printer for PHPUnit.
 *
 * (c) Jeff Welch <whatthejeff@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace NyanCat\PHPUnit;



use NyanCat\Cat;
use NyanCat\Rainbow;
use NyanCat\Team;
use NyanCat\FixedScoreboard;

use Fab\Factory as FabFactory;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestResult;
use PHPUnit\Framework\TestSuite;

//support for versions older than 9.0
if(version_compare(\PHPUnit\Runner\Version::id(), "9.0","<")){
	class_alias('\PHPUnit\TextUI\ResultPrinter','\PHPUnit\TextUI\DefaultResultPrinter');
}

/**
 * Mmmm poptarts...
 *
 * -_-_-_-_,------,
 * -_-_-_-_|   /\_/\
 * -_-_-_-^|__( ^ .^)
 * -_-_-_-  ""  ""
 *
 * @author Jeff Welch <whatthejeff@gmail.com>
 */
class ResultPrinter extends \PHPUnit\TextUI\DefaultResultPrinter
{


	const ESC = "\x1b[";

    /**
     * The Nyan Cat scoreboard.
     *
     * @var \NyanCat\FixedScoreboard
     */
    private $scoreboard;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        $out = NULL,
        $verbose = FALSE,
        $colors = self::COLOR_DEFAULT,
        $debug = FALSE,
        $numberOfColumns = 80,
        $reverse = false
    ) {
        $this->scoreboard = new FixedScoreboard(
            new Cat(),
            new Rainbow(
                FabFactory::getFab(
                    empty($_SERVER['TERM']) ? 'unknown' : $_SERVER['TERM']
                )
            ),
            array(
                new Team('pass', 'green', '^'),
                new Team('fail', 'red', 'o'),
                new Team('pending', 'cyan', '-')
            ),
            6,
            array($this, 'write')
        );

        parent::__construct($out, $verbose, self::COLOR_ALWAYS, $debug);
    }

    /**
     * {@inheritdoc}
     */
    protected function writeProgress(string $progress): void
    {
        if($this->debug) {
            parent::writeProgress($progress);
            return;
        }

		$this->numTestsRun++;

        $this->scoreboard->score($progress, 1, \floor(($this->numTestsRun / $this->numTests) * 100));
    }

    /**
     * {@inheritdoc}
     */
    protected function printHeader(TestResult $result = null): void
    {
        if (!$this->debug) {
            if (!$this->scoreboard->isRunning()) {
                $this->scoreboard->start();
            }
            $this->scoreboard->stop();
        }

        parent::printHeader($result);
    }

    /**
     * {@inheritdoc}
     */
    public function addError(Test $test, \Throwable $e, float $time): void
    {
        if ($this->debug) {
            parent::addError($test, $e, $time);
            return;
        }

        $this->writeProgress('fail');
        $this->lastTestFailed = TRUE;
    }

    /**
     * {@inheritdoc}
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        if ($this->debug) {
            parent::addFailure($test, $e, $time);
            return;
        }

        $this->writeProgress('fail');
        $this->lastTestFailed = TRUE;
    }

    /**
     * {@inheritdoc}
     */
    public function addIncompleteTest(Test $test, \Throwable $e, float $time): void
    {
        if ($this->debug) {
            parent::addIncompleteTest($test, $e, $time);
            return;
        }

        $this->writeProgress('pending');
        $this->lastTestFailed = TRUE;
    }

    /**
     * {@inheritdoc}
     */
    public function addSkippedTest(Test $test, \Throwable $e, float $time): void
    {
        if ($this->debug) {
            parent::addSkippedTest($test, $e, $time);
            return;
        }

        $this->writeProgress('pending');
        $this->lastTestFailed = TRUE;
    }

    /**
     * {@inheritdoc}
     */
    public function startTestSuite(TestSuite $suite): void
    {
        if ($this->debug) {
            parent::startTestSuite($suite);
            return;
        }

        if ($this->numTests == -1) {
            parent::startTestSuite($suite);
            $this->scoreboard->start();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function endTest(Test $test, float $time): void
    {
        if ($this->debug) {
            parent::endTest($test, $time);
            return;
        }

        if (!$this->lastTestFailed) {
            $this->writeProgress('pass');
        }

        if ($test instanceof TestCase) {
            $this->numAssertions += $test->getNumAssertions();
        }

        $this->lastTestFailed = FALSE;
    }
}
