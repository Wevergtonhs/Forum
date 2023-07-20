<?php

namespace App\Repositories;

interface PaginateInterface
{
    /**
     * @retun stdClass[]
     */
    public function items(): array;
    public function total(): int;
    public function isFirstPage(): bol;
    public function isLastPage(): bol;
    public function currentPage(): int;
    public function getNumberNextPage(): int;
    public function getNumberPreviousPage(): int;
}