#!/bin/bash
php gerar_configuracao.php

cd ..

cd models

php ../../bin/classmap_generator.php
