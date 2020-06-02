#Resonai Website 
The Resonai website currently uses Angular 1.7 and utilizes Google Cloud infrastructure.

The documentation for Angulat 1.7[^1] can be found here https://code.angularjs.org/1.7.5/docs/guide.

## Instructions for Editing CSS

**When editing the site css files the index.css file should not be edited directly.**

To edit the css go to the [index.scss](/css/index.scss) file located in the css directory. 

Once edited the file will need to be compiled. This will output the css file. 

The index.scss file also cantains imports for the fonts and other pages css. 

The jobs page also has a [sass file](/css/jobs.scss) and once this is edited will also require the [index.scss](/css/index.scss) file be compiled.

**If you do not already have Sass or an IDE with sass built (most IDE's have Sass plugins available), you may alternatively manually install and run sass by follow the instructions here: https://sass-lang.com/guide.**

## Other recommendations

The backend code has css files, images and event template and JS files which are not used and can be cleaned up and removed entirely.

[^1]: Angular 1.7 will reach end of life June 30 2021 and will no longer be maintained by Google it is recommended that the site be migrated to the new [Angular](https://angular.io/) (or another platform of choice) on or before this date.
