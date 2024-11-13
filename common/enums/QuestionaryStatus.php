<?php

namespace common\enums;

/**
 * @package common\enums
 * @author m.kropukhinsky <m.kropukhinsky@peppers-studio.ru>
 */
enum QuestionaryStatus: int implements DictionaryInterface
{
    use DictionaryTrait;

    case Officially_free = 0;
    case Probation = 10;

    /**
     * {@inheritdoc}
     */
    public function description(): string
    {
        return match ($this) {
            self::Officially_free => 'Официально на свободе',
            self::Probation => 'Условный срок'
        };
    }

    /**
     * {@inheritdoc}
     */
    public function color(): string
    {
        return match ($this) {
            self::Officially_free => 'var(--bs-success)',
            self::Probation => 'var(--bs-danger)'
        };
    }
}
