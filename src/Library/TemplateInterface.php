<?php

namespace Library;

interface TemplateInterface
{
    public function render(string $template, array $data = []): string;
}