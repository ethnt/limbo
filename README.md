# Limbo

**Authors**: Ethan Turkeltaub, Matt Maffa

---

Limbo is a project for CMPT221L that keeps track of lost and found items.

## Development

Limbo uses [gulp.js](http://gulpjs.com/) and [Bower](http://bower.io) to manage assets. To install the depedencies, you need [Node.js](http://nodejs.org) and [npm](https://www.npmjs.org) installed. Then, run:

```
$ npm install
```

To get the assets from bower, run:

```
$ gulp bower
```

Finally, to compile our assets (SCSS and CoffeeScript), you can run this to compile all of them:

```
$ gulp all
```

See `gulpfile.js` for more options.
