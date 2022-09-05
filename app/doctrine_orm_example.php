<?php

use App\Entity\Invoice;
use App\Entity\InvoiceItem;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Tools\SchemaTool;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManager::create(
    [
        'host'     => 'localhost',
        'user'     => 'root',
        'password' => 'openfind',
        'dbname'   => 'test',
        'driver'   => 'pdo_mysql'
    ],
    ORMSetup::createAnnotationMetadataConfiguration([
        __DIR__ . '/Entity'
    ])
);

#$class = $entityManager->getClassMetadata(Invoice::class);
#$tool = new SchemaTool($entityManager);
#$classes = [
#    $entityManager->getClassMetadata(Invoice::class),
#    $entityManager->getClassMetadata(InvoiceItem::class)
#];
#$tool->createSchema($classes);

$invoice = new Invoice();
$invoice
    ->setAmount(45)
    ->setInvoiceNumber('1')
    ->setStatus(\App\Enums\InvoiceStatus::Pending)
    ->setCreatedAt(new DateTime());

$invoiceItem = new InvoiceItem();
$invoiceItem
    ->setDescription('Item')
    ->setQuantity(1)
    ->setUnitPrice(15);

$invoice->addItem($invoiceItem);

$entityManager->persist($invoice);
$entityManager->flush();
