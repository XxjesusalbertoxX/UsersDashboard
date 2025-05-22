#!/bin/bash

# Creamos el archivo de password para autenticación smtp
echo "[smtp.gmail.com]:587 $SMTP_USER:$SMTP_PASS" > /etc/postfix/sasl_passwd

postmap /etc/postfix/sasl_passwd
chmod 600 /etc/postfix/sasl_passwd /etc/postfix/sasl_passwd.db

# Configurar hostname para postfix
echo "$MAILNAME" > /etc/mailname

# Lanzar postfix
/usr/sbin/postfix start-fg
