npm install tailwindcss @tailwindcss/cli
mkdir src
notepad src\input.cs
paste here:

```css
@import 'tailwindcss';
```

npx @tailwindcss/cli -i ./src/input.css -o ./src/output.css --watch
