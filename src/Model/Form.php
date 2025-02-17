<?php
/**
 * Этот файл является частью расширения модуля веб-приложения GearMagic.
 * 
 * @link https://gearmagic.ru
 * @copyright Copyright (c) 2015 Веб-студия GearMagic
 * @license https://gearmagic.ru/license/
 */

namespace Gm\Backend\Config\WSpace\Model;

use Gm\Backend\Config\Model\ServiceForm;

/**
 * Модель данных конфигурации "Рабочее пространство".
 * 
 * @author Anton Tivonenko <anton.tivonenko@gmail.com>
 * @package Gm\Backend\Config\WSpace\Model
 * @since 1.0
 */
class Form extends ServiceForm
{
    /**
     * {@inheritdoc}
     */
    public function init(): void
    {
        parent::init();

        $this->unifiedName = 'workspace';
    }

    /**
     * {@inheritdoc}
     */
    public function maskedAttributes(): array
    {
        return [
            'menuVisible'          => 'menuVisible',
            'traybarVisible'       => 'traybarVisible',
            'partitionbarVisible'  => 'partitionbarVisible',
            'partitionbarPosition' => 'partitionbarPosition',
            'navigatorVisible'     => 'navigatorVisible',
            'navigatorCollapsible' => 'navigatorCollapsible',
            'navigatorSplit'       => 'navigatorSplit',
            'navigatorWidth'       => 'navigatorWidth',
            'navigatorPosition'    => 'navigatorPosition',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave(bool $isInsert): bool
    {
        $this->menuVisible = $this->menuVisible && $this->menuVisible === 'on' ? true : false;
        $this->traybarVisible  = $this->traybarVisible && $this->traybarVisible === 'on' ? true : false;
        $this->partitionbarVisible  = $this->partitionbarVisible && $this->partitionbarVisible === 'on' ? true : false;
        $this->navigatorVisible = $this->navigatorVisible && $this->navigatorVisible === 'on' ? true : false;
        $this->navigatorSplit = $this->navigatorSplit && $this->navigatorSplit === 'on' ? true : false;
        $this->navigatorCollapsible = $this->navigatorCollapsible && $this->navigatorCollapsible === 'on' ? true : false;

        return parent::beforeSave($isInsert);
    }
}
