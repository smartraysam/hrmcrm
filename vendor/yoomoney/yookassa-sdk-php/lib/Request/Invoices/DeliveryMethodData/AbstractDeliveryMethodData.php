<?php

/*
 * The MIT License
 *
 * Copyright (c) 2025 "YooMoney", NBСO LLC
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace YooKassa\Request\Invoices\DeliveryMethodData;

use YooKassa\Common\AbstractObject;
use YooKassa\Model\Invoice\DeliveryMethod\DeliveryMethodType;
use YooKassa\Validator\Constraints as Assert;

/**
 * Класс, представляющий модель DeliveryMethodDataSelfAllOf.
 *

 * @category Class
 * @package  YooKassa\Model
 * @author   cms@yoomoney.ru
 * @link     https://yookassa.ru/developers/api
 *
 * @property string $type Код способа доставки счета пользователю.
*/
abstract class AbstractDeliveryMethodData extends AbstractObject
{
    /**
     * Код способа доставки счета пользователю
     *
     * @var string|null
     */
    #[Assert\NotBlank]
    #[Assert\Choice(callback: [DeliveryMethodType::class, 'getValidValues'])]
    #[Assert\Type('string')]
    protected ?string $_type = null;

    /**
     * Возвращает type.
     *
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->_type;
    }

    /**
     * Устанавливает type.
     *
     * @param string|null $type
     *
     * @return self
     */
    public function setType(?string $type = null): self
    {
        $this->_type = $this->validatePropertyValue('_type', $type);
        return $this;
    }

}

