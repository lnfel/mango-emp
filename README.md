# Mango SIMS: EMP module

## Setting up workspace

1. [Install](#installation)
2. [Set baseUrl](#baseurl)
3. [Run xampp](#run-xampp)
4. [Git basics](#git-basics)
5. [Git intermediate](#git-intermediate)
6. [Git workflow](#git-workflow)

#### Installation
**Download** the repo and place it on xampp/htdocs folder or clone it using git cli:

    cd C:\xampp\htdocs
    git clone https://github.com/lnfel/mango-emp.git

on `git bash`:

    cd /c/xampp/htdocs
    git clone https://github.com/lnfel/mango-emp.git

#### Create branch
Open `cmd` and cd to project directory:

    cd C:\xampp\htdocs\mango-emp

or via `git bash`

    cd /c/xampp/htdocs/mango-emp

Then run:

    git init
    git branch your-branch-name

For example `git branch login-mod`. You can name it however you want, you can name it using your first name too. Just remember to make it so it's easy to understand like in the example, as `login-mod` can mean that someone is working on the `login modules` of the app.

By default creating a new branch will simply copy from the `master` branch, meaning we need to set it up for use in local environment. Follow the next steps to run the project on your machine.

#### baseUrl
Check app/Config/App.php and configure the `$baseUrl`:

    public $baseURL = 'http://emp.mangosystemtech.com';

to

    public $baseURL = 'http://localhost/mango-emp/public';

> `Development` branch is already configured to work on local environment, just switch your branch to development and pull the latest development branch. This is recommended when app is cloned the first time. [Learn more](#checkout-development)

#### Run xampp
Run xampp control panel and start `Apache` and `MySQL` service and browse to `localhost/mango-emp/public`.

> Optional Note: xampp root can be modified via Apacche `httpd.conf` on xampp control panel or look in:

    C:\xampp\apache\conf

Then change the lines:

    DocumentRoot "C:/xampp/htdocs"
    <Directory "C:/xampp/htdocs"> 

And point it to your project folder:

    DocumentRoot "C:/xampp/htdocs/codeigniter4/public"
    <Directory "C:/xampp/htdocs/codeigniter4/public">

This will enable you to browse the index.php on codeigniter 4 directly using `http://localhost`. If root is `htdocs` you will need to browse `http://localhost/mango-emp/public`.

## Git Basics
[Git GUI](https://desktop.github.com/) on desktop also uses the same features.
Get [Git CLI](https://git-scm.com/downloads) here.

#### git init
- Set the current folder to become a new local repository or initialize existing repository on current folder

#### git status
- Check file changes on your working directory

#### git add
- Add changed files to staging (prapared for committing)
- `git add -A` adds all changed files to staging.
- `git add <filename>` add a file to staging. Ex: `git add about.php`, `git add app/views/home.php`.
- Running [`git status`](#git-status) will show files and their relative paths that needs to be added to staging area.

#### git commit
- Save changes on current local repository.
- `git commit -m "Deleted index.php"`, passing `-m` option allows us to put comments to our commits. Remember to wrap comments inside double quotes.

#### git branch
- Lists all existing local branch.
- `git branch <branch-name>`, creates new local branch.

#### git pull
- Download all changes from `<remote>` and directly merge it to current `<branch>`.
- `git pull <remote> <branch>`, Ex. `git pull origin master` download updates from remote master branch.
- Running `git remote` lists all remote links, by default you will have remote `origin` that clones from `master` branch if you have cloned the repository from github.

#### git push
- `git push origin master`, pushes the changes to remote `origin` on `master` branch.
- To push to a different branch for example `development` branch, `git push origin development`.

#### git checkout
- By default git will initialize on `master` branch, use checkout option to switch branches locally.
- Ex. switch to development branch, `git checkout development`. Note: the branch must exist first before switching out. Learn [`git branch`](#git-branch).

## Git Intermediate

#### checkout development
Checkout `development` from `<remote>`

    git checkout --track origin/development

This will create a new branch named `development` from remote `origin` and switch to development branch.

> Note: with Git 2.23 (Q3 2019), that would use the new command git switch:

    git switch -c <branch> --track <remote>/<branch>

> Source: https://stackoverflow.com/questions/10002239/difference-between-git-checkout-track-origin-branch-and-git-checkout-b-branch


## Git Workflow
If you have finished setting up the environment for our project we need to make use of git version control to avoid problems during development.

1. First open `cmd` and cd to our project folder and initialize the repo:

    cd C:\xampp\htdocs\mango-emp
    git init

2. Run `git branch` to list all branches. If you followed [basic installation](#installation), you should see that you are on the `master` branch.

- If you haven't created your own branch to work with, run `git branch your-branch-name`.
- Checkout to it by running `git checkout your-branch-name`.
- Then follow steps on how to configure [`baseUrl`](#baseurl)

But if you followed [intermediate setup](#checkout-development), you should see two branches. One for `master` and `development`, the current branch would be highlighted with green color or would have an asterisk `*` at the beginning of the branch name.

- `master` and `development` branch are reserved so you would also create you branch to work with, in this case we'll create new branch from development.
- Run `git checkout -b your-branch-name development`

3. You are now all set to work on the project safely.

4. After making your changes, it is time to save it. The following commands will add the changes to staging area, commit and comment it, then push the changes to the `<remote>/<branch>`.

    git status
    git add -A
    git commit -m "Tell us what changes are made"
    git push -u origin your-branch-name

> Note: The `-u` option in `git push -u origin your-branch-name` sets the upstream link from your local repo to the remote branch you specified, in this case remote `origin` on `your-branch-name`. If there was no same branch name, it will create a new one and push the changes there.

> The second time you need to push changes you can just run `git push origin your-branch-name`

5. All the changes from all of the branches will then be `merged` on `testing` branch which Dale would create sooner we have changes made.

6. If testing is successful on live server, it will be merged on `development` branch where the developers can fetch the latest working code for local environment. `testing` branch will be deleted afterwards.

7. `development` will finally gets merged into `master` and deployed on the live server.