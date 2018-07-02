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

use Compo\CurrencyBundle\Entity\Currency;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadPageData.
 */
class LoadCurrencyData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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
                'name' => 'Российский убль',
                'code' => 'RUB',
                'rate' => 1,
                'sign' => 'руб.',
                'symbol' => 'руб.',
                'cbrf' => false
            ],
            [
                'name' => 'Евро',
                'code' => 'EUR',
                'rate' => 70,
                'sign' => 'евро',
                'symbol' => 'евро',
                'cbrf' => true
            ],
            [
                'name' => 'Доллар',
                'code' => 'USD',
                'rate' => 60,
                'sign' => 'доллар',
                'symbol' => '$',
                'cbrf' => true
            ],
        ];

        foreach ($data as $item) {
            $newItem = new Currency();

            $newItem->setName($item['name']);
            $newItem->setCode($item['code']);
            $newItem->setRate($item['rate']);
            $newItem->setSign($item['sign']);
            $newItem->setSymbol($item['symbol']);
            $newItem->setUpdateCbrf($item['cbrf']);

            $manager->persist($newItem);
        }

        $manager->flush();
    }
}
