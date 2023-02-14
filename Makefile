ifneq ("$(wildcard composer.phar)","")
    EXE := php
    COMPOSER := composer.phar
else
    EXE := ./vendor/bin/sail
    COMPOSER := composer
endif

#Composer
.PHONY: composerInstall
composerInstall:
	${EXE} ${COMPOSER} install

.PHONY: composerDumpAutoload
composerDumpAutoload:
	${EXE} ${COMPOSER} dump-autoload

.PHONY: composerDumpAutoloadOptimized
composerDumpAutoloadOptimized:
	${EXE} ${COMPOSER} dump-autoload -o

#Laravel Artisan
.PHONY: cacheClear
cacheClear:
	${EXE} artisan optimize:clear
	${EXE} artisan optimize

.PHONY: configClear
configClear:
	${EXE} artisan config:clear

.PHONY: keyGenerate
keyGenerate:
	${EXE} artisan key:generate

.PHONY: routesClear
routesClear:
	${EXE} artisan route:clear

.PHONY: migrate
migrate:
	${EXE} artisan migrate

.PHONY: migrateFreshSeed
migrateFreshSeed:
	${EXE} artisan migrate:fresh --seed

.PHONY: dbSeed
dbSeed:
	${EXE} artisan db:seed

#NPM
.PHONY: npmInstall
npmInstall:
	${EXE} npm install

.PHONY: npmRunDev
npmRunDev:
	${EXE} npm npmRunDev
