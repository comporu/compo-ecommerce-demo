<?php

/*
 * This file is part of the CompoSymfonyCms package.
 * (c) Compo.ru <info@compo.ru>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CompoEcommerceDemo\AppBundle\DataFixtures;

use Compo\CountryBundle\Entity\Country;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadPageData.
 */
class LoadCountryData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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
        $countryData = [
            [
                'name' => 'Россия',
                'code' => 'RU',
            ],
            [
                'name' => 'Беларусь',
                'code' => 'BY',
            ],
            [
                'name' => 'Казахстан',
                'code' => 'KZ',
            ],
            [
                'name' => 'США',
                'code' => 'US',
            ],
        ];

        foreach ($countryData as $item) {
            $country = new Country();
            $country->setEnabled(true);
            $country->setName($item['name']);
            $country->setCode($item['code']);

            $manager->persist($country);
        }

        $manager->flush();
    }
}
