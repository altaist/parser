# Test PHP parser
## Usage
<pre>
try {
  $parserBuilder = (new ParserBuilder())
    ->setTransportClass(FromTextTransport::class)
    ->setStorageClass(TagStorage::class)
    ->setProcessorClass(TagCounterProcessor::class)
    ->setParserClass(TagCounterParser::class);

  $parser = $parserBuilder->build();

  $resultData = $parser->parse(new TextSource("&ltbr&gt&lt;p&gt;&lt;/p&gt;&lt;p&gt;"));
  $result = new ParseResultFormatter($resultData);

  print_r($result->getAsArray());

} catch (TransportException $th) {
} catch (ParseException $th) {
}
</pre>

See Example\TagCounterExample.php for complete example.
