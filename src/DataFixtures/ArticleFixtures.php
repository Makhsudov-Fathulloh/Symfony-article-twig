<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\UserFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
  public function load(ObjectManager $manager): void
  {
      $article = new Article();
      $article->setTitle('Lorem ipsum 1');
      $article->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit');
      $article->setText('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
      $article->setImagePath('https://www.google.com/url?sa=i&url=http%3A%2F%2Fufa.uz%2Fwhat-is-lorem-ipsumuzb%2F%3Flang%3Dru&psig=AOvVaw1pkiggt38DkxcjMkXa-LME&ust=1679512312524000&source=images&cd=vfe&ved=0CBEQjhxqFwoTCNCNqYnd7f0CFQAAAAAdAAAAABAE');

      $article->setUser($this->getReference('user_1'));
      $manager->persist($article);


      $article2 = new Article();
      $article2->setTitle('Lorem ipsum 2');
      $article2->setDescription('Lorem ipsum dolor sit amet, consectetur adipiscing elit');
      $article2->setText('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
      $article2->setImagePath('https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.cnnindonesia.com%2Fgaya-hidup%2F20190711165522-284-411342%2Fmenguak-arti-lorem-ipsum-yang-mendadak-muncul-di-koran&psig=AOvVaw1pkiggt38DkxcjMkXa-LME&ust=1679512312524000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCNCNqYnd7f0CFQAAAAAdAAAAABAS');

      $article->setUser($this->getReference('user_2'));
      $manager->persist($article2);

      $manager->flush();
  }

  public function getDependencies()
  {
    return [
      UserFixtures::class,
    ];
  }

}
