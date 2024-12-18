<?php

namespace MauticPlugin\LenonLeiteM5ExamplePluginBundle\EventListener;

use Mautic\PageBundle\PageEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Mautic\PageBundle\Event as Events;

class InterceptPageHitsSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
        return [
            PageEvents::PAGE_ON_HIT => ['onPageHit', 0],
        ];
    }

    /**
     * Trigger point actions for page hits.
     */
    public function onPageHit(Events\PageHitEvent $event): void
    {
        $request = $event->getRequest();
        // Cookies
        $cookies = $request->cookies;

        // Hit
        $hit = $event->getHit();

        // It is id that we were looking for
        $trackingId = $hit->getTrackingId();

        // It is the lead that we were add or null
        $lead = $hit->getLead();
        if (null === $lead) {
            return;
        }

        // Do something with the lead
        // remove, check if have similarity with other leads, etc
    }


}