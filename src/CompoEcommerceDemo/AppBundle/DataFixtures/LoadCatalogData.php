<?php

/*
 * This file is part of the CompoSymfonyCms package.
 * (c) Compo.ru <info@compo.ru>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CompoEcommerceDemo\AppBundle\DataFixtures;

use Compo\CatalogBundle\Entity\Catalog;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class LoadPageData.
 */
class LoadCatalogData extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
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
        $rootCatalog = new Catalog();
        $rootCatalog->setEnabled(true);
        $rootCatalog->setName('Каталог');

        $manager->persist($rootCatalog);

        $catalog = new Catalog();
        $catalog->setEnabled(true);
        $catalog->setName('Плитка');
        $catalog->setParent($rootCatalog);

        $manager->persist($catalog);

        $catalog1 = new Catalog();
        $catalog1->setEnabled(true);
        $catalog1->setName('Сантехника');
        $catalog1->setParent($rootCatalog);

        $manager->persist($catalog1);

        $catalog2 = new Catalog();
        $catalog2->setEnabled(true);
        $catalog2->setName('Ванные');
        $catalog2->setParent($catalog1);

        $manager->persist($catalog2);

        $catalog2 = new Catalog();
        $catalog2->setEnabled(true);
        $catalog2->setName('Смесители');
        $catalog2->setParent($catalog1);

        $manager->persist($catalog2);

        $manager->flush();
    }
}
