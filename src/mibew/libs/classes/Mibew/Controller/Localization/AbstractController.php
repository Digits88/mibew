<?php
/*
 * Copyright 2005-2014 the original author or authors.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Mibew\Controller\Localization;

use Mibew\Controller\AbstractController as BaseAbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Provides a set of utility functions.
 */
abstract class AbstractController extends BaseAbstractController
{
    /**
     * Builds list of the localization tabs.
     *
     * @param Request $request Current request.
     * @return array Tabs list. The keys of the array are tabs titles and the
     *   values are tabs URLs.
     */
    protected function buildTabs(Request $request)
    {
        $tabs = array();
        $route = $request->attributes->get('_route');

        $tabs[getlocal('page_localization.tab.translation')] = ($route != 'translations')
            ? $this->generateUrl('translations')
            : '';

        $tabs[getlocal('page_localization.tab.locale')] = ($route != 'locales')
            ? $this->generateUrl('locales')
            : '';

        return $tabs;
    }
}