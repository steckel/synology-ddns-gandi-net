# synology-ddns-gandi-net

## Installation

ssh into your synology disk station, clone the repository down, symlink the php
script to the `/usr/syno/bin/ddns/` directory and add an entry for the
Gandi.net ddns in the coniguration at `/etc.defaults/ddns_provider.cond`

```
git clone https://github.com/steckel/synology-ddns-gandi-net.git
cd synology-ddns-gandi-net
ln -s gandinet.php /usr/syno/bin/ddns/gandinet.php
```

```
vi /etc.defaults/ddns_provider.conf
```

```
[Gandi.net]
        modulepath=/usr/syno/bin/ddns/gandinet.php
        website=http://www.gandi.net
        queryurl=https://www.gandi.com/
```
