<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CompoEcommerceDemo\AppBundle\DataFixtures;

use Compo\UnitBundle\Entity\Unit;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadPageData.
 */
class LoadUnitData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /** @var ContainerInterface */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @return \Sonata\MediaBundle\Model\MediaManagerInterface
     */
    public function getMediaManager()
    {
        return $this->container->get('sonata.media.manager.media');
    }

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $data = [
            [
                'name' => 'Штука',
                'shortNameNational' => 'шт',
                'literalNameNational' => 'ШТ',
                'shortNameInternational' => 'pc',
                'literalNameInternational' => 'PCE',
                'type' => 'integer',
            ],
            [
                'name' => 'Упаковка',
                'shortNameNational' => 'упак',
                'literalNameNational' => 'УПАК',
                'shortNameInternational' => 'pkg',
                'literalNameInternational' => 'NMP',
                'type' => 'integer',
            ],
            [
                'name' => 'Сантиметр',
                'shortNameNational' => 'см',
                'literalNameNational' => 'СМ',
                'shortNameInternational' => 'cm',
                'literalNameInternational' => 'CMT',
                'type' => 'decimal',
            ],
            [
                'name' => 'Миллиметр',
                'shortNameNational' => 'мм',
                'literalNameNational' => 'ММ',
                'shortNameInternational' => 'mm',
                'literalNameInternational' => 'MMT',
                'type' => 'decimal',
            ],
            [
                'name' => 'Метр',
                'shortNameNational' => 'м',
                'literalNameNational' => 'М',
                'shortNameInternational' => 'm',
                'literalNameInternational' => 'MTR',
                'type' => 'decimal',
            ],
            [
                'name' => 'Комплект',
                'shortNameNational' => 'компл',
                'literalNameNational' => 'КОМПЛ',
                'shortNameInternational' => 'set',
                'literalNameInternational' => 'SET',
                'type' => 'integer',
            ],
            [
                'name' => 'Килограмм',
                'shortNameNational' => 'кг',
                'literalNameNational' => 'КГ',
                'shortNameInternational' => 'kg',
                'literalNameInternational' => 'KGM',
                'type' => 'decimal',
            ],
            [
                'name' => 'Квадратный метр',
                'shortNameNational' => 'м<sup>2</sup>',
                'literalNameNational' => 'М2',
                'shortNameInternational' => 'm2',
                'literalNameInternational' => 'MTK',
                'type' => 'decimal',
            ],
        ];

        foreach ($data as $item) {
            $newItem = new Unit();

            $newItem->setName($item['name']);
            $newItem->setShortNameNational($item['shortNameNational']);
            $newItem->setLiteralNameNational($item['literalNameNational']);
            $newItem->setShortNameInternational($item['shortNameInternational']);
            $newItem->setLiteralNameInternational($item['literalNameInternational']);
            $newItem->setType($item['type']);

            $manager->persist($newItem);
        }

        $manager->flush();
    }
}
