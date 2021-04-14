### Build project
```
cp ./.env.dist ./.env
docker-compose build
```

### Run project
```
docker-compose up -d
```

### Prepare project
```
make install_vendor && make update_database
```

### Run consumer
```
make run_sum_consumer
```

### Enable rabbitmq management plugin:
```
make enable_management_plugin
```

### Navigation:
One page with form: 
[http://localhost:8085/](http://localhost:8085/)

Rabbitmq management plugin: 
[http://127.0.0.1:15672/](http://127.0.0.1:15672/)
