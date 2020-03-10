import arg from "arg";
import fs from "fs";

function parseArgumentsIntoOptions(rawArgs) {
  const args = arg(
    {
      "--block": String,
      "-b": "--block",
      "--component": String,
      "-c": "--component"
    },
    {
      argv: rawArgs.slice(2)
    }
  );
  return {
    block: args["--block"] || false,
    component: args["--component"] || false
  };
}

export function cli(args) {
  let options = parseArgumentsIntoOptions(args);
  if (options.block) {
    let block = options.block;
    fs.writeFile(
      `./components/blocks/${block}.php`,
      '<?php\n/**\n * Display Block\n *\n * @category   Components\n * @package    WordPress\n * @subpackage Incredible Theme\n * @author     Nick Gonzales\n * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3\n * @link       https://www.incrediblemarketing.com/\n * @since      1.0.0\n */\n\n?>\n\n<div class="container-fluid">\n  <div class="row">\n\n </div>\n</div>',
      err => {
        if (err) throw err;
      }
    );
    fs.writeFile(
      `./assets/src/sass/components/blocks/_${block}.scss`,
      `.block--${block} {\n  \n}`,
      err => {
        if (err) throw err;
      }
    );
    let pattern = /\/\*block_insert\*\//gim;
    let data = fs.readFileSync("./assets/src/sass/main.scss").toString();
    let match = pattern.exec(data);
    let afterIndex = match.index + match[0].length;
    let newData =
      data.slice(0, afterIndex) +
      `\n@import "components/blocks/${block}";` +
      data.slice(afterIndex);
    fs.writeFile("./assets/src/sass/main.scss", newData, function(err) {
      if (err) return console.log(err);
    });
    console.log(`created block ${block}`);
  }
  if (options.component) {
    let component = options.component;
    fs.writeFile(`./components/${component}.php`, "", err => {
      if (err) throw err;
    });
    fs.writeFile(
      `./assets/src/sass/components/_${component}.scss`,
      `.${component} {\n  \n}`,
      err => {
        if (err) throw err;
      }
    );
    let pattern = /\/\*component_insert\*\//gim;
    let data = fs.readFileSync("./assets/src/sass/main.scss").toString();
    let match = pattern.exec(data);
    let afterIndex = match.index + match[0].length;
    let newData =
      data.slice(0, afterIndex) +
      `\n@import "components/${component}";` +
      data.slice(afterIndex);
    fs.writeFile("./assets/src/sass/main.scss", newData, function(err) {
      if (err) return console.log(err);
    });
    console.log(`created component ${component}`);
  }
}
