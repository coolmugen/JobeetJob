srcdir = /home/sfprojects/JobeetJob/xdebug-2.1.0
builddir = /home/sfprojects/JobeetJob/xdebug-2.1.0
top_srcdir = /home/sfprojects/JobeetJob/xdebug-2.1.0
top_builddir = /home/sfprojects/JobeetJob/xdebug-2.1.0
EGREP = /bin/grep -E
SED = /bin/sed
CONFIGURE_COMMAND = './configure' '--enable-xdebug'
CONFIGURE_OPTIONS = '--enable-xdebug'
SHLIB_SUFFIX_NAME = so
SHLIB_DL_SUFFIX_NAME = so
ZEND_EXT_TYPE = zend_extension
RE2C = exit 0;
AWK = nawk
shared_objects_xdebug = xdebug.lo xdebug_code_coverage.lo xdebug_com.lo xdebug_compat.lo xdebug_handler_dbgp.lo xdebug_handlers.lo xdebug_llist.lo xdebug_hash.lo xdebug_private.lo xdebug_profiler.lo xdebug_set.lo xdebug_stack.lo xdebug_str.lo xdebug_superglobals.lo xdebug_tracing.lo xdebug_var.lo xdebug_xml.lo usefulstuff.lo
PHP_PECL_EXTENSION = xdebug
XDEBUG_SHARED_LIBADD = -lm
PHP_MODULES =
PHP_ZEND_EX = $(phplibdir)/xdebug.la
all_targets = $(PHP_MODULES) $(PHP_ZEND_EX)
install_targets = install-modules install-headers
prefix = /usr
exec_prefix = $(prefix)
libdir = ${exec_prefix}/lib
prefix = /usr
phplibdir = /home/sfprojects/JobeetJob/xdebug-2.1.0/modules
phpincludedir = /usr/include/php5
CC = cc
CFLAGS = -g -O0
CFLAGS_CLEAN = $(CFLAGS)
CPP = cc -E
CPPFLAGS = -DHAVE_CONFIG_H
CXX =
CXXFLAGS =
CXXFLAGS_CLEAN = $(CXXFLAGS)
EXTENSION_DIR = /usr/lib/php5/20090626+lfs
PHP_EXECUTABLE = /usr/bin/php
EXTRA_LDFLAGS =
EXTRA_LIBS =
INCLUDES = -I/usr/include/php5 -I/usr/include/php5/main -I/usr/include/php5/TSRM -I/usr/include/php5/Zend -I/usr/include/php5/ext -I/usr/include/php5/ext/date/lib -D_LARGEFILE_SOURCE -D_FILE_OFFSET_BITS=64
LFLAGS =
LDFLAGS =
SHARED_LIBTOOL =
LIBTOOL = $(SHELL) $(top_builddir)/libtool
SHELL = /bin/bash
INSTALL_HEADERS =
mkinstalldirs = $(top_srcdir)/build/shtool mkdir -p
INSTALL = $(top_srcdir)/build/shtool install -c
INSTALL_DATA = $(INSTALL) -m 644

DEFS = -DPHP_ATOM_INC -I$(top_builddir)/include -I$(top_builddir)/main -I$(top_srcdir)
COMMON_FLAGS = $(DEFS) $(INCLUDES) $(EXTRA_INCLUDES) $(CPPFLAGS) $(PHP_FRAMEWORKPATH)

all: $(all_targets) 
	@echo
	@echo "Build complete."
	@echo "Don't forget to run 'make test'."
	@echo
	
build-modules: $(PHP_MODULES) $(PHP_ZEND_EX)

libphp$(PHP_MAJOR_VERSION).la: $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS)
	$(LIBTOOL) --mode=link $(CC) $(CFLAGS) $(EXTRA_CFLAGS) -rpath $(phptempdir) $(EXTRA_LDFLAGS) $(LDFLAGS) $(PHP_RPATHS) $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS) $(EXTRA_LIBS) $(ZEND_EXTRA_LIBS) -o $@
	-@$(LIBTOOL) --silent --mode=install cp $@ $(phptempdir)/$@ >/dev/null 2>&1

libs/libphp$(PHP_MAJOR_VERSION).bundle: $(PHP_GLOBAL_OBJS) $(PHP_SAPI_OBJS)
	$(CC) $(MH_BUNDLE_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS) $(LDFLAGS) $(EXTRA_LDFLAGS) $(PHP_GLOBAL_OBJS:.lo=.o) $(PHP_SAPI_OBJS:.lo=.o) $(PHP_FRAMEWORKS) $(EXTRA_LIBS) $(ZEND_EXTRA_LIBS) -o $@ && cp $@ libs/libphp$(PHP_MAJOR_VERSION).so

install: $(all_targets) $(install_targets)

install-sapi: $(OVERALL_TARGET)
	@echo "Installing PHP SAPI module:       $(PHP_SAPI)"
	-@$(mkinstalldirs) $(INSTALL_ROOT)$(bindir)
	-@if test ! -r $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME); then \
		for i in 0.0.0 0.0 0; do \
			if test -r $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME).$$i; then \
				$(LN_S) $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME).$$i $(phptempdir)/libphp$(PHP_MAJOR_VERSION).$(SHLIB_DL_SUFFIX_NAME); \
				break; \
			fi; \
		done; \
	fi
	@$(INSTALL_IT)

install-modules: build-modules
	@test -d modules && \
	$(mkinstalldirs) $(INSTALL_ROOT)$(EXTENSION_DIR)
	@echo "Installing shared extensions:     $(INSTALL_ROOT)$(EXTENSION_DIR)/"
	@rm -f modules/*.la >/dev/null 2>&1
	@$(INSTALL) modules/* $(INSTALL_ROOT)$(EXTENSION_DIR)

install-headers:
	-@if test "$(INSTALL_HEADERS)"; then \
		for i in `echo $(INSTALL_HEADERS)`; do \
			i=`$(top_srcdir)/build/shtool path -d $$i`; \
			paths="$$paths $(INSTALL_ROOT)$(phpincludedir)/$$i"; \
		done; \
		$(mkinstalldirs) $$paths && \
		echo "Installing header files:          $(INSTALL_ROOT)$(phpincludedir)/" && \
		for i in `echo $(INSTALL_HEADERS)`; do \
			if test "$(PHP_PECL_EXTENSION)"; then \
				src=`echo $$i | $(SED) -e "s#ext/$(PHP_PECL_EXTENSION)/##g"`; \
			else \
				src=$$i; \
			fi; \
			if test -f "$(top_srcdir)/$$src"; then \
				$(INSTALL_DATA) $(top_srcdir)/$$src $(INSTALL_ROOT)$(phpincludedir)/$$i; \
			elif test -f "$(top_builddir)/$$src"; then \
				$(INSTALL_DATA) $(top_builddir)/$$src $(INSTALL_ROOT)$(phpincludedir)/$$i; \
			else \
				(cd $(top_srcdir)/$$src && $(INSTALL_DATA) *.h $(INSTALL_ROOT)$(phpincludedir)/$$i; \
				cd $(top_builddir)/$$src && $(INSTALL_DATA) *.h $(INSTALL_ROOT)$(phpincludedir)/$$i) 2>/dev/null || true; \
			fi \
		done; \
	fi

PHP_TEST_SETTINGS = -d 'open_basedir=' -d 'output_buffering=0' -d 'memory_limit=-1'
PHP_TEST_SHARED_EXTENSIONS =  ` \
	if test "x$(PHP_MODULES)" != "x"; then \
		for i in $(PHP_MODULES)""; do \
			. $$i; $(top_srcdir)/build/shtool echo -n -- " -d extension=$$dlname"; \
		done; \
	fi; \
	if test "x$(PHP_ZEND_EX)" != "x"; then \
		for i in $(PHP_ZEND_EX)""; do \
			. $$i; $(top_srcdir)/build/shtool echo -n -- " -d $(ZEND_EXT_TYPE)=$(top_builddir)/modules/$$dlname"; \
		done; \
	fi`
PHP_DEPRECATED_DIRECTIVES_REGEX = '^(define_syslog_variables|register_(globals|long_arrays)?|safe_mode|magic_quotes_(gpc|runtime|sybase)?|(zend_)?extension(_debug)?(_ts)?)[\t\ ]*='

test: all
	-@if test ! -z "$(PHP_EXECUTABLE)" && test -x "$(PHP_EXECUTABLE)"; then \
		INI_FILE=`$(PHP_EXECUTABLE) -d 'display_errors=stderr' -r 'echo php_ini_loaded_file();' 2> /dev/null`; \
		if test "$$INI_FILE"; then \
			$(EGREP) -h -v $(PHP_DEPRECATED_DIRECTIVES_REGEX) "$$INI_FILE" > $(top_builddir)/tmp-php.ini; \
		else \
			echo > $(top_builddir)/tmp-php.ini; \
		fi; \
		INI_SCANNED_PATH=`$(PHP_EXECUTABLE) -d 'display_errors=stderr' -r '$$a = explode(",\n", trim(php_ini_scanned_files())); echo $$a[0];' 2> /dev/null`; \
		if test "$$INI_SCANNED_PATH"; then \
			INI_SCANNED_PATH=`$(top_srcdir)/build/shtool path -d $$INI_SCANNED_PATH`; \
			$(EGREP) -h -v $(PHP_DEPRECATED_DIRECTIVES_REGEX) "$$INI_SCANNED_PATH"/*.ini >> $(top_builddir)/tmp-php.ini; \
		fi; \
		TEST_PHP_EXECUTABLE=$(PHP_EXECUTABLE) \
		TEST_PHP_SRCDIR=$(top_srcdir) \
		CC="$(CC)" \
			$(PHP_EXECUTABLE) -n -c $(top_builddir)/tmp-php.ini $(PHP_TEST_SETTINGS) $(top_srcdir)/run-tests.php -n -c $(top_builddir)/tmp-php.ini -d extension_dir=$(top_builddir)/modules/ $(PHP_TEST_SHARED_EXTENSIONS) $(TESTS); \
		rm $(top_builddir)/tmp-php.ini; \
	else \
		echo "ERROR: Cannot run tests without CLI sapi."; \
	fi

clean:
	find . -name \*.gcno -o -name \*.gcda | xargs rm -f
	find . -name \*.lo -o -name \*.o | xargs rm -f
	find . -name \*.la -o -name \*.a | xargs rm -f 
	find . -name \*.so | xargs rm -f
	find . -name .libs -a -type d|xargs rm -rf
	rm -f libphp$(PHP_MAJOR_VERSION).la $(SAPI_CLI_PATH) $(OVERALL_TARGET) modules/* libs/*

distclean: clean
	rm -f Makefile config.cache config.log config.status Makefile.objects Makefile.fragments libtool main/php_config.h stamp-h sapi/apache/libphp$(PHP_MAJOR_VERSION).module buildmk.stamp
	$(EGREP) define'.*include/php' $(top_srcdir)/configure | $(SED) 's/.*>//'|xargs rm -f

.PHONY: all clean install distclean test
.NOEXPORT:
install: $(all_targets) $(install_targets) show-install-instructions

show-install-instructions:
	@echo
	@$(top_srcdir)/build/shtool echo -n -e %B
	@echo   "  +----------------------------------------------------------------------+"
	@echo   "  |                                                                      |"
	@echo   "  |   INSTALLATION INSTRUCTIONS                                          |"
	@echo   "  |   =========================                                          |"
	@echo   "  |                                                                      |"
	@echo   "  |   See http://xdebug.org/install.php#configure-php for instructions   |"
	@echo   "  |   on how to enable Xdebug for PHP.                                   |"
	@echo   "  |                                                                      |"
	@echo   "  |   Documentation is available online as well:                         |"
	@echo   "  |   - A list of all settings:  http://xdebug.org/docs-settings.php     |"
	@echo   "  |   - A list of all functions: http://xdebug.org/docs-functions.php    |"
	@echo   "  |   - Profiling instructions:  http://xdebug.org/docs-profiling2.php   |"
	@echo   "  |   - Remote debugging:        http://xdebug.org/docs-debugger.php     |"
	@echo   "  |                                                                      |"
	@echo   "  |                                                                      |"
	@echo   "  |   NOTE: Please disregard the message                                 |"
	@echo   "  |       You should add \"extension=xdebug.so\" to php.ini                |"
	@echo   "  |   that is emitted by the PECL installer. This does not work for      |"
	@echo   "  |   Xdebug.                                                            |"
	@echo   "  |                                                                      |"
	@echo   "  +----------------------------------------------------------------------+"
	@$(top_srcdir)/build/shtool echo -n -e %b
	@echo
	@echo
xdebug.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug.c -o xdebug.lo 
xdebug_code_coverage.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_code_coverage.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_code_coverage.c -o xdebug_code_coverage.lo 
xdebug_com.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_com.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_com.c -o xdebug_com.lo 
xdebug_compat.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_compat.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_compat.c -o xdebug_compat.lo 
xdebug_handler_dbgp.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_handler_dbgp.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_handler_dbgp.c -o xdebug_handler_dbgp.lo 
xdebug_handlers.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_handlers.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_handlers.c -o xdebug_handlers.lo 
xdebug_llist.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_llist.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_llist.c -o xdebug_llist.lo 
xdebug_hash.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_hash.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_hash.c -o xdebug_hash.lo 
xdebug_private.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_private.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_private.c -o xdebug_private.lo 
xdebug_profiler.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_profiler.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_profiler.c -o xdebug_profiler.lo 
xdebug_set.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_set.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_set.c -o xdebug_set.lo 
xdebug_stack.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_stack.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_stack.c -o xdebug_stack.lo 
xdebug_str.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_str.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_str.c -o xdebug_str.lo 
xdebug_superglobals.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_superglobals.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_superglobals.c -o xdebug_superglobals.lo 
xdebug_tracing.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_tracing.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_tracing.c -o xdebug_tracing.lo 
xdebug_var.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_var.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_var.c -o xdebug_var.lo 
xdebug_xml.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_xml.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/xdebug_xml.c -o xdebug_xml.lo 
usefulstuff.lo: /home/sfprojects/JobeetJob/xdebug-2.1.0/usefulstuff.c
	$(LIBTOOL) --mode=compile $(CC)  -I. -I/home/sfprojects/JobeetJob/xdebug-2.1.0 $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS)  -c /home/sfprojects/JobeetJob/xdebug-2.1.0/usefulstuff.c -o usefulstuff.lo 
$(phplibdir)/xdebug.la: ./xdebug.la
	$(LIBTOOL) --mode=install cp ./xdebug.la $(phplibdir)

./xdebug.la: $(shared_objects_xdebug) $(XDEBUG_SHARED_DEPENDENCIES)
	$(LIBTOOL) --mode=link $(CC) $(COMMON_FLAGS) $(CFLAGS_CLEAN) $(EXTRA_CFLAGS) $(LDFLAGS) -o $@ -export-dynamic -avoid-version -prefer-pic -module -rpath $(phplibdir) $(EXTRA_LDFLAGS) $(shared_objects_xdebug) $(XDEBUG_SHARED_LIBADD)

