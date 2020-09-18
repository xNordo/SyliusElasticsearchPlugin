<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on mikolaj.krol@bitbag.pl.
 */

declare(strict_types=1);

namespace spec\BitBag\SyliusElasticsearchPlugin\PropertyBuilder;

use BitBag\SyliusElasticsearchPlugin\Repository\TaxonRepositoryInterface;
use BitBag\SyliusElasticsearchPlugin\PropertyBuilder\AbstractBuilder;
use BitBag\SyliusElasticsearchPlugin\PropertyBuilder\AttributeTaxonsBuilder;
use BitBag\SyliusElasticsearchPlugin\PropertyBuilder\PropertyBuilderInterface;
use Elastica\Document;
use FOS\ElasticaBundle\Event\TransformEvent;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Attribute\Model\AttributeInterface;

final class AttributeTaxonsBuilderSpec extends ObjectBehavior
{
    function let(TaxonRepositoryInterface $taxonRepository): void
    {
        $this->beConstructedWith(
            $taxonRepository,
            'taxons'
        );
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(AttributeTaxonsBuilder::class);
        $this->shouldHaveType(AbstractBuilder::class);
    }

    function it_implements_property_builder_interface(): void
    {
        $this->shouldHaveType(PropertyBuilderInterface::class);
    }

    function it_consumes_event(TransformEvent $event, AttributeInterface $attribute, Document $document): void
    {
        $event->getObject()->willReturn($attribute);
        $event->getDocument()->willReturn($document);

        $this->consumeEvent($event);
    }
}
