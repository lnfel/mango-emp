# Mango SIMS: EMP module

## Setting up workspace
**Download** the repo and place it on xampp/htdocs folder or clone it using git cli:

    cd C:\xampp\htdocs
    git clone https://github.com/lnfel/mango-emp.git

on git bash:

    cd /c/xampp/htdocs
    git clone https://github.com/lnfel/mango-emp.git

Check app/Config/App.php and change the `$baseUrl`:

    public $baseURL = 'http://emp.mangosystemtech.com';

to

    public $baseURL = 'http://localhost/mango-emp/public';

> `Development` branch is already configured to work on local environment, just switch your branch to development and pull the latest development branch. This is recommended when app is cloned the first time. [Learn more](#checkout-development)

**Run xampp server**

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
