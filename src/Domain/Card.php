<?php

namespace WayForPay\SDK\Domain;

class Card
{
    /**
     * @var string
     */
    private $card;

    /**
     * @var int
     */
    private $month;

    /**
     * @var int
     */
    private $year;

    /**
     * @var int
     */
    private $cvv;

    /**
     * @var string
     */
    private $holder;

    /**
     * Card constructor.
     * @param string $card
     * @param int $month
     * @param int $year
     * @param int $cvv
     * @param string $holder
     */
    public function __construct($card, $month, $year, $cvv, $holder)
    {
        if ($month < 1 || $month > 12) {
            throw new \InvalidArgumentException('Invalid month');
        }

        if ($year < intval(date('Y'))) {
            throw new \InvalidArgumentException('Invalid year');
        }

        $this->card = strval($card);
        $this->month = intval($month);
        $this->year = intval($year);
        $this->cvv = intval($cvv);
        $this->holder = strval($holder);
    }

    /**
     * @return string
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     * @return string
     */
    public function getHolder()
    {
        return $this->holder;
    }
}