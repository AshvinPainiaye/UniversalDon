<?php

namespace Simplon\ActivitePartageBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SimplonActivitePartageBundle extends Bundle
{
  public function getParent()
  {
      return 'FOSUserBundle';
  }
}
