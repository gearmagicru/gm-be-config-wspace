<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\WSpace\Controller;

use Gm;
use Gm\Panel\Widget\EditWindow;
use Gm\Backend\Config\Controller\ServiceForm;

/**
 * Контроллер конфигурации "Рабочее пространство".
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\WSpace\Controller
 * @since 1.0
 */
class Form extends ServiceForm
{
    /**
     * Возвращает элементы панели формы (Gm.view.form.Panel GmJS).
     * 
     * @return array
     */
    protected function getFormItems(): array
    {
        $unified = Gm::$app->unifiedConfig->get('workspace');
        return [
            [
                'xtype' => 'label',
                'ui'    => 'header-line',
                'text'  => '#Main menu',
            ],
            [
                'xtype'      => 'checkbox',
                'fieldLabel' => '#Show main menu',
                'labelWidth' => 150,
                'labelAlign' => 'right',
                'name'       => 'menuVisible',
                'checked'    => $unified['menuVisible'] ?? true,
                'ui'         => 'switch'
            ],
            [
                'xtype' => 'toolbar',
                'items' => [
                    '->',
                    [
                        'xtype'       => 'button',
                        'ui'          => 'form-info',
                        'cls'         => 'g-form__button g-form__button_blue',
                        'text'        => '<i class="far fa-edit"></i> ' . $this->module->t('Edit'),
                        'handler'     => 'loadWidget',
                        'handlerArgs' => ['route' => '@backend/menu']
                    ],
                ]
            ],
            [
                'xtype' => 'label',
                'ui'    => 'header-line',
                'text'  => '#Tray bar',
            ],
            [
                'xtype'      => 'checkbox',
                'fieldLabel' => '#Show panel',
                'labelWidth' => 150,
                'labelAlign' => 'right',
                'name'       => 'traybarVisible',
                'checked'    => $unified['traybarVisible'] ?? true,
                'ui'         => 'switch'
            ],
            [
                'xtype' => 'toolbar',
                'items' => [
                    '->',
                    [
                        'xtype'       => 'button',
                        'ui'          => 'form-info',
                        'cls'         => 'g-form__button g-form__button_blue',
                        'text'        => '<i class="far fa-edit"></i> ' . $this->module->t('Edit'),
                        'handler'     => 'loadWidget',
                        'handlerArgs' => ['route' => '@backend/traybar']
                    ],
                ]
            ],
            [
                'xtype' => 'label',
                'ui'    => 'header-line',
                'text'  => '#Partition bar',
            ],
            [
                'xtype'      => 'checkbox',
                'fieldLabel' => '#Show panel',
                'labelWidth' => 150,
                'labelAlign' => 'right',
                'name'       => 'partitionbarVisible',
                'checked'    => $unified['partitionbarVisible'] ?? true,
                'ui'         => 'switch'
            ],
            [
                'xtype'      => 'combobox',
                'fieldLabel' => '#Panel position',
                'labelWidth' => 150,
                'labelAlign' => 'right',
                'name'       => 'partitionbarPosition',
                'value'      => $unified['partitionbarPosition'] ?? 'west',
                'store'      => [
                    'fields' => ['title', 'value'],
                    'data' => [
                        ['#Right', 'east'],
                        ['#Left', 'west'],
                        ['#Top', 'north'],
                        ['#Bottom', 'south']
                    ]
                ],
                'width'        => '100%',
                'displayField' => 'title',
                'valueField'   => 'value',
                'hiddenField'  => 'partitionbarPosition',
                'queryMode'    => 'local',
                'editable'     => false,
                'allowBlank'   => false
            ],
            [
                'xtype' => 'toolbar',
                'items' => [
                    '->',
                    [
                        'xtype'       => 'button',
                        'ui'          => 'form-info',
                        'cls'         => 'g-form__button g-form__button_blue',
                        'text'        => '<i class="far fa-edit"></i> ' . $this->module->t('Edit'),
                        'handler'     => 'loadWidget',
                        'handlerArgs' => ['route' => '@backend/partitionbar']
                    ]
                ]
            ],
            [
                'xtype' => 'label',
                'ui'    => 'header-line',
                'text'  => '#Navigator',
            ],
            [
                'xtype'      => 'checkbox',
                'fieldLabel' => '#Show panel',
                'labelAlign' => 'right',
                'labelWidth' => 200,    
                'name'       => 'navigatorVisible',
                'checked'    => $unified['navigatorVisible'] ?? true,
                'ui'         => 'switch'
            ],
            [
                'xtype'      => 'checkbox',
                'fieldLabel' => '#Collapsible panel',
                'labelAlign' => 'right',
                'labelWidth' => 200,    
                'name'       => 'navigatorCollapsible',
                'checked'    => $unified['navigatorCollapsible'] ??  true,
                'ui'         => 'switch'
            ],
            [
                'xtype'      => 'checkbox',
                'fieldLabel' => '#Split panel',
                'labelAlign' => 'right',
                'labelWidth' => 200,    
                'name'       => 'navigatorSplit',
                'checked'    => $unified['navigatorSplit'] ?? true,
                'ui'         => 'switch'
            ],
            [
                'xtype'      => 'textfield',
                'fieldLabel' => '#Panel width',
                'labelAlign' => 'right',
                'labelWidth' => 200,    
                'name'       => 'navigatorWidth',
                'width'      => 250,
                'value'      => $unified['navigatorWidth'] ?? 300
            ],
            [
                'xtype'      => 'combobox',
                'fieldLabel' => '#Panel position',
                'labelAlign' => 'right',
                'labelWidth' => 200,    
                'name'       => 'navigatorPosition',
                'value'      => $unified['navigatorPosition'] ?? 'east',
                'store'      => [
                    'fields' => ['title', 'value'],
                    'data' => [
                        ['#Right', 'east'],
                        ['#Left', 'west'],
                        ['#Top', 'north'],
                        ['#Bottom', 'south']
                    ]
                ],
                'width'        => '100%',
                'displayField' => 'title',
                'valueField'   => 'value',
                'hiddenField'  => 'navigatorPosition',
                'queryMode'    => 'local',
                'editable'     => false,
                'allowBlank'   => false
            ],
            [
                'xtype'  => 'toolbar',
                'dock'   => 'bottom',
                'border' => 0,
                'style'  => ['borderStyle' => 'none'],
                'items'  => [
                    [
                        'xtype'    => 'checkbox',
                        'boxLabel' => $this->module->t('reset settings'),
                        'name'     => 'reset]',
                        'ui'       => 'switch'
                    ]
                ]
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function createWidget(): EditWindow
    {
        /** @var EditWindow $window */
        $window = parent::createWidget();

        // окно компонента (Ext.window.Window Sencha ExtJS)
        $window->height = 720;
        $window->width = 400;
        $window->responsiveConfig = [
            'height < 720' => ['height' => '99%'],
            'width < 400' => ['width' => '99%'],
        ];

        // панель формы (Gm.view.form.Panel GmJS)
        $window->form->autoScroll = true;
        $window->form->items = $this->getFormItems();
        return $window;
    }
}
