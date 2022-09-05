<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table("invoice_items")
 */
class InvoiceItem
{
    /**
     * @ORM\Id
     * @ORM\Column
     * @ORM\GeneratedValue
     */
    private int $id;

    /**
     * @ORM\Column(name="invoice_id")
     */
    private int $invoiceId;

    /**
     * @ORM\Column
     */
    private string $description;

    /**
     * @ORM\Column
     */
    private int $quantity;

    /**
     * @ORM\Column(name="unit_price", type=Types::DECIMAL, precision=10, scale=2)
     */
    private float $unitPrice;

    /**
     * @ORM\ManyToOne(inversedBy="items")
     */
    private Invoice $invoice;

    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoiceId(): int
    {
        return $this->invoiceId;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): InvoiceItem
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): InvoiceItem
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(float $unitPrice): InvoiceItem
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice $invoice): InvoiceItem
    {
        $this->invoice = $invoice;

        return $this;
    }
}
