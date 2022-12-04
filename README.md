
# WP Dashboard Widget

A Wordpress plugin created as a challenge.

## Installation

To use this plugin you just have to drop it in the plugins folder at your Wordpress location and activate it in the plugins section.

For editing it, make the changes in the code and then run
```bash
  npm run build
```
To create a build version.
    
## Routes

#### Retrieve the data

```http
  GET /wpdw/data?range=(number)
```

Returns a list of random generated data to be used in the graph.

If the range argument isn't defined, will be generated 30 samples of data by default.

Your path will be something like:

```http
  .../wp-json/wpdw/data?range=(number)
```

