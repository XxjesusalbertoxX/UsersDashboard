FROM ubuntu:22.04

RUN apt-get update && apt-get install -y postfix libsasl2-modules mailutils

COPY main.cf /etc/postfix/main.cf
COPY setup.sh /setup.sh
RUN chmod +x /setup.sh

CMD ["/setup.sh"]
