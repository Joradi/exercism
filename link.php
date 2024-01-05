<?php

declare(strict_types=1);
class LinkedList
{
    private ?Node $head = null;
    private ?Node $tail = null;
    public function push(int $value): void
    {
        $node = new Node($value);
        if (is_null($this->head)) {
            $this->tail = $node;
            $this->head = $node;
            return;
        }       

        $this->tail->setNext($node);
        $node->setPrev($this->tail);
        $this->tail = $node;
    }
    public function pop(): ?int{

        if (is_null($this->tail)) {
            $this->head = null;
            return null;
        }
        $value = $this->tail->value();
        $this->tail = $this->tail->prev();
        return $value;
    }
    public function unshift(int $value): void
    {
        $node = new Node($value);
        if (is_null($this->head)) {
            $this->head = $node;
            $this->tail = $node;
            return;
        }
        $this->head->setPrev($node);
        $node->setNext($this->head);
        $this->head = $node;
    }

    public function shift(): ?int
    {
        if (is_null($this->head)) {
            $this->tail = null;
            return null;
        }                 

        $value = $this->head->value();     
        $this->head = $this->head->next();
        return $value;
    }
}
class Node
{
    private int $value;
    private ?Node $prev = null;
    private ?Node $next = null;
    public function __construct(int $value)
    {

        $this->value = $value;

    }

    public function prev(): ?Node

    {
        return $this->prev;

    }

    public function setPrev(?Node $node): void

    {
        $this->prev = $node;

    }
    public function next(): ?Node
    {

        return $this->next;

    }
    public function setNext(?Node $node): void
    {
        $this->next = $node;
    }
    public function value(): int
    {
        return $this->value;

    }     
}