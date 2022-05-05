<?php

namespace Payments;

interface ApplyMethodFilterInterface
{
    public function applyFilter(Request $request, MethodList $methods, MethodList &$filteredMethodList): void;
}