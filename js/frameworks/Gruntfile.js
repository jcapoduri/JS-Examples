// Demo configuration file
module.exports = function(grunt) {
    // load tasks
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-requirejs');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-clean');

    //config each task
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n'
            },
            build: {
                src: 'js/main.js',
                dest: 'bin/js/<%= pkg.name %>.min.js'
            }
        },
        requirejs: {
            compile: {
                options: {
                    baseUrl: "js",
                    mainConfigFile: "js/app/main.js",
                    out: "bin/js/main.js",
                    include: ['app/main.js'],
                    //optimize: 'uglify',
                    normalizeDirDefines: 'all'
                }
            }
        },
        cssmin: {
          compile: {
            files: {
              'bin/styles/style.css': ['styles/bootstrap.css', 'styles/bootstrap-theme.css', 'styles/bootstrap-responsive.css']
            }
          }
        },
        copy: {
          compile: {
            files: [
              {expand: true, src: ['css/**'], dest: 'bin/'},
              {expand: true, src: ['fonts/**'], dest: 'bin/'},
              {expand: true, dot: true, src: ['fonts/api/**'], dest: 'bin/'},
              //{expand: true, dot: true, cwd: 'server/', src: ['**'], dest: 'bin/'},
              {expand: true, src: ['index.html'], dest: 'bin/'},
              {expand: true, src: ['.htaccess'], dest: 'bin/'},
              {expand: true, cwd: 'js/vendor/require', src: ['require.js', 'text.js'], dest: 'bin/js'},
            ]
          }
        },
        clean: ['bin/']
    });


     // Registering grunt tasks
    grunt.registerTask('default', ['uglify']);

    grunt.registerTask('compile', ['clean', 'requirejs', 'copy']);
    grunt.registerTask('php', ['copy']);
};