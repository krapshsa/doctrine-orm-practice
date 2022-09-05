<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enums\InvoiceStatus;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table("invoices")
 */
class Invoice
{
    /**
     * @ORM\Id
     * @ORM\Column
     * @ORM\GeneratedValue
     */
    private int $id;

    /**
     * @ORM\Column(type=Types::DECIMAL, precision=10, scale=2)
     */
    private float $amount;

    /**
     * @ORM\Column(name="invoice_number")
     */
    private string $invoiceNumber;

    /**
     * @ORM\Column
     */
    private InvoiceStatus $status;

    /**
     * @ORM\Column(name="created_at")
     */
    private \DateTime $createdAt;

    /**
     * @ORM\OneToMany(mappedBy="invoice", targetEntity=InvoiceItem::class, cascade={"persist", "remove"})
     */
    private Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): Invoice
    {
        $this->amount = $amount;

        return $this;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(string $invoiceNumber): Invoice
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    public function getStatus(): InvoiceStatus
    {
        return $this->status;
    }

    public function setStatus(InvoiceStatus $status): Invoice
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): Invoice
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<InvoiceItem>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(InvoiceItem $item): Invoice
    {
        $item->setInvoice($this);

        $this->items->add($item);

        return $this;
    }
}
