[![Build Status](https://scrutinizer-ci.com/g/etrias-nl/ewarehousing-connector/badges/build.png?b=master)](https://scrutinizer-ci.com/g/etrias-nl/ewarehousing-connector/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/etrias-nl/ewarehousing-connector/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/etrias-nl/ewarehousing-connector/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/etrias-nl/ewarehousing-connector/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/etrias-nl/ewarehousing-connector/?branch=master)

# ewarehousing-connector
PHP connector for ewarehousing api


#Setup example

```php
/**
 * @return array
 */
function getEwhConfig() {
    return [
        'base_uri' => EWH_ENDPOINT,
    ];

}
/**
 * @return callable
 */
function getEwhLogger()
{
    static $loggerMiddleware = null;

    if (!is_callable($loggerMiddleware)) {
        $logger = new Logger('ewarehousing');

        $streamHandler = new \Monolog\Handler\StreamHandler(LOG_DIR.'/ewarehousing.log', Logger::INFO);
        $streamHandler->setFormatter(new \Monolog\Formatter\JsonFormatter());
        $logger->pushHandler($streamHandler);

        $loggerMiddleware = \GuzzleHttp\Middleware::log($logger, new \GuzzleHttp\MessageFormatter());
    }

    return $loggerMiddleware;
}

function getEwhCacheAdapter()
{
    static $adapter = null;

    if (!$adapter instanceof AdapterInterface) {
        $adapter = new RedisAdapter(getRedisClient());
    }

    return $adapter;
}

function getEwhSerializer()
{
    static $serializer = null;

    if (!$serializer instanceof GuzzleClient)
    {
        $serializer = SerializerBuilder::create()
            ->setCacheDir(sys_get_temp_dir().'/jms-cache')
            ->setDebug(true)
            ->addMetadataDir(__DIR__.'/../../../vendor/etrias/ewarehousing-connector/src/Serializer/Metadata', 'Etrias\EwarehousingConnector')
            ->addDefaultDeserializationVisitors()
            ->addDefaultSerializationVisitors()
            ->addDefaultHandlers()
            ->configureHandlers(function (HandlerRegistry $registry) {
                $registry->registerSubscribingHandler(new DateHandler());
            })
            ->setSerializationVisitor('array', new ArraySerializationVisitor(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy()), new DefaultAccessorStrategy()))
            ->setDeserializationVisitor('array', new ArrayDeserializationVisitor(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy()), new DefaultAccessorStrategy()))
            ->build();
    }

    return $serializer;
}

function getEwhAuthenticationService()
{
    static $authenticationService = null;

    if (!$authenticationService instanceof AuthenticationServiceInterface)
    {
        $client = new EwarehousingClient(getEwhConfig());

        $authenticationService = new AuthenticationService(
            $client,
            getEwhSerializer(),
            EWH_USERNAME,
            EWH_CUSTOMERID,
            EWH_PASSWORD,
            getEwhCacheAdapter()
        );
    }

    return $authenticationService;
}

function getEwhClient()
{
    static $client = null;

    if (!$client instanceof EwarehousingClientInterface) {
        $client = ClientFactory::create()
            ->setAuthenticationService(getEwhAuthenticationService())
            ->setConfig(getEwhConfig())
            ->pushToHandlerStack(getEwhLogger())
            ->build();
    }

    return $client;
}

function getEwhInboundService()
{
    static $service = null;

    if (!$service instanceof InboundServiceInterface) {
        $service = new InboundService(getEwhClient(), getEwhSerializer());
    }

    return $service;
}

function getEwhOrderService()
{
    static $service = null;

    if (!$service instanceof OrderServiceInterface) {
        $service = new OrderService(getEwhClient(), getEwhSerializer());
    }

    return $service;
}

function getEwhStockService()
{
    static $service = null;

    if (!$service instanceof StockServiceInterface) {
        $service = new StockService(getEwhClient(), getEwhSerializer());
    }

    return $service;
}
}
```
