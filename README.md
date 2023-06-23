## Theme requested for 'Wordpress Developer' job offer.

![screenshot](https://github.com/c39ae5fb19236d50b0f1ec26c/wordpress-tailwind-vite/blob/e5b9e7f7c4d13fe84ae2f22b57fe291a53efa6af/wp-app/wp-content/themes/mytheme/screenshot.png)

Wordpress develepoment with Docker

### Configuration

Copy the example environment into `.env`

```
cp .env.example .env
```

### Installation

Open a terminal and `cd` to the folder in which `docker-compose.yml` is saved and run:

```
docker-compose up
```

### For Vite compile

Go to folder `wp-app/wp-content/themes/mytheme` and install npm packages:

```
npm install
```

or

```
yarn install
```

then build the latests styles for theme:

```
npm run build
```

or

```
yarn build
```

### Left Right block
If you need to make changes in the block file, navigate to the `wp-app/wp-content/plugins/my-custom-block` folder, and edit `src/index.js`. Then, compile the changes:

```
npm run build
```

or 

```
yarn build
```

