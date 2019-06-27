<?php

namespace WayForPay\SDK\Response;

use Easy\Collections\ArrayList;
use WayForPay\SDK\Collection\TransactionHistoryCollection;
use WayForPay\SDK\Domain\TransactionHistory;

class TransactionListResponse extends Response
{
    /**
     * @var ArrayList
     */
    private $transactionList;

    public function __construct(array $data)
    {
        parent::__construct($data);

        if (!isset($data['transactionList'])) {
            throw new \InvalidArgumentException('Field `reason` required');
        }

        $this->transactionList = new TransactionHistoryCollection();

        foreach ($data['transactionList'] as $transaction) {
            $this->transactionList->add(TransactionHistory::fromArray($transaction));
        }
    }

    /**
     * @return ArrayList
     */
    public function getTransactionList()
    {
        return $this->transactionList;
    }
}