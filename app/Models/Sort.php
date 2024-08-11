<?php

namespace App\Models;

use App\Helpers\Utilities;

/**
 * For query order and list pagination
 */
class Sort
{
    protected ?array $orderBys;     // order by fields
    protected ?array $sortOrders;   // ASC or DESC

    protected ?int $currentPage;
    protected ?int $rpp;
    protected ?int $count;          // number of items
    protected ?int $pageTotal;      // number of pages

    public function __construct() {
        $this->orderBys = array();
        $this->sortOrders  = array();
        $this->currentPage  = 1;
        $this->rpp = Utilities::PAGINATION_DEFAULT_RPP;
    }

    public static function create($orderBys, $sortOrders, $currentPage, $rpp, $count) {
        $instance = new self();
        $instance->setOrderBys($orderBys);
        $instance->setSortOrders($sortOrders);
        $instance->setCurrentPage($currentPage);
        $instance->setRpp($rpp);
        $instance->setCount($count);
        $instance->setPageTotal(ceil($count/$rpp));
        return $instance;
    }

    public function getOrderBys() {
        return $this->orderBys;
    }
    public function setOrderBys($orderBys = array()) {
        $this->orderBys = $orderBys;
        return $this;
    }

    public function getSortOrders() {
        return $this->sortOrders;
    }
    public function setSortOrders($sortOrders = array()) {
        $this->sortOrders = $sortOrders;
        return $this;
    }

    public function getCurrentPage(): ?int {
        return $this->currentPage;
    }
    public function setCurrentPage($currentPage = 1) {
        $this->currentPage = $currentPage;
        return $this;
    }

    public function getRpp(): ?int {
        return $this->rpp;
    }
    public function setRpp($rpp = Utilities::PAGINATION_DEFAULT_RPP) {
        $this->rpp = $rpp;
        return $this;
    }

    public function getPageTotal(): ?int {
        return $this->pageTotal;
    }
    public function setPageTotal($pageTotal = null) {
        $this->pageTotal = $pageTotal;
        return $this;
    }

    public function getCount(): ?int {
        return $this->count;
    }
    public function setCount($count = null) {
        $this->count = $count;
        return $this;
    }

    public function hasPrevious() {
        return $this->getCurrentPage() > 1;
    }
    public function hasNext() {
        return $this->getCurrentPage() < $this->getPageTotal();
    }
}