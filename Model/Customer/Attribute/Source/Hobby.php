<?php

declare(strict_types=1);

namespace MT\Hobby\Model\Customer\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Hobby extends AbstractSource
{
    public const HOBBY_CONFIG_PATH = 'hobby/general/hobby_list';

    public function __construct(
        private readonly Json                 $serializer,
        private readonly ScopeConfigInterface $config
    ) {
    }

   public function getOptionText($value)
   {
       return parent::getOptionText($value);
   }

    /**
     * getAllOptions
     *
     * @return array<string,string>
     */
    public function getAllOptions(): array
    {
        if ($this->_options === null) {
            $this->_options = \array_values(
                \array_map(
                    static fn ($v) => $v,
                    $this->serializer->unserialize(
                        $this->config->getValue(self::HOBBY_CONFIG_PATH)
                    )
                )
            );

            array_unshift($this->_options, [
                'value' => '',
                'label' => '--'
            ]);
        }

        return $this->_options;
    }
}
