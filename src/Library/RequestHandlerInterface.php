<?php

namespace Library;

interface RequestHandlerInterface
{
    public function handle(Request $request): Response;
}