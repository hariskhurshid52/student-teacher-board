<?php
	/**
	 * footer.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 01:36
	 */
?>


<!-- Scripts -->
<script src="<?= base_url() ?>/assets/theme/assets/js/core.min.js" data-provide="sweetalert"></script>
<script src="<?= base_url() ?>/assets/theme/assets/js/app.min.js"></script>
<script src="<?= base_url() ?>/assets/theme/assets/js/script.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js" ></script>
<script>
	<?php if(!empty($this->session->flashdata('message'))): ?>
    app.toast('<?=$this->session->flashdata('message')?>', {

        actionColor: 'info'
    });
	<?php endif; ?>
    $("#new-student").click((_e) => {
        let _elem = $(_e.currentTarget);
        app.modaler({
            url: `<?=base_url('student-reg-content')?>`,
            type: 'center',
            size: 'w-80',
            title: 'Student Registration',
            confirmVisible: false,
            onCancel: function (modal) {
                app.toast('You canceled it!');
            }
        });
    })

    function saveStudent() {
        if ($(".modal #name").val() == "") {
            app.toast('Please enter valid name', {
                actionTitle: 'Validation',
                actionColor: 'info'
            });
        } else if ($(".modal #username").val() == "") {
            app.toast('Please enter valid username', {
                actionTitle: 'Validation',
                actionColor: 'info'
            });
        } else if ($(".modal #email").val() == "") {
            app.toast('Please enter valid email', {
                actionTitle: 'Validation',
                actionColor: 'info'
            });
        } else if ($(".modal #password").val() == "") {
            app.toast('Please enter valid password', {
                actionTitle: 'Validation',
                actionColor: 'info'
            });
        } else {
            $(".preloader ").css('display', '');
            $.ajax({
                url: `<?=base_url('save-student')?>`,
                type: 'POST',
                data: {
                    name: $(".modal #name").val(),
                    username: $(".modal #username").val(),
                    email: $(".modal #email").val(),
                    password: $(".modal #password").val()
                },
                success: function (response) {
                    response = JSON.parse(response);
                    $(".preloader ").css('display', 'none');
                    if (response.status == "success") {
                        app.toast('Successfully register student', {
                            actionColor: 'success'
                        });

                    } else {
                        app.toast('Failed to add in student', {
                            actionTitle: 'Failed',
                            actionColor: 'danger'
                        });
                        window.location.reload()
                    }


                }
            })
        }
    }

    function addUpdateClass(id = "new") {
        app.modaler({
            url: `<?=base_url('add-update-class-content')?>?class=${id}`,
            type: 'center',
            size: 'w-800px',
            title: id == "new" ? 'Add New Class' : ' Update Class',
            confirmVisible: false,
            onCancel: function (modal) {
                app.toast('You canceled it!');
            }
        });
    }
    function addUpdateCohort(id = "new") {
        app.modaler({
            url: `<?=base_url('add-update-cohort-content')?>?cohort=${id}`,
            type: 'center',
            size: 'w-800px',
            title: id == "new" ? 'Add New cohort' : ' Update cohort',
            confirmVisible: false,
            onCancel: function (modal) {
                app.toast('You canceled it!');
            }
        });
    }
    function saveClass() {
        if ($(".modal #name").val() == "") {
            app.toast('Please enter valid name', {
                actionTitle: 'Validation',
                actionColor: 'info'
            });
        } else {
            $(".preloader ").css('display', '');
            $.ajax({
                url: `<?=base_url('save-class')?>`,
                type: 'POST',
                data: {
                    name: $(".modal #name").val(),
                },
                success: function (response) {
                    response = JSON.parse(response);
                    $(".preloader ").css('display', 'none');
                    if (response.status == "success") {
                        app.toast('Successfully added class', {
                            actionColor: 'success'
                        });

                    } else {
                        app.toast('Failed to add  class', {
                            actionTitle: 'Failed',
                            actionColor: 'danger'
                        });

                    }
                    window.location.reload()

                }
            })
        }
    }
    function saveCohort() {
        if ($(".modal #name").val() == "") {
            app.toast('Please enter valid name', {
                actionTitle: 'Validation',
                actionColor: 'info'
            });
        } else {
            $(".preloader ").css('display', '');
            $.ajax({
                url: `<?=base_url('save-cohort')?>`,
                type: 'POST',
                data: {
                    name: $(".modal #name").val(),
                },
                success: function (response) {
                    response = JSON.parse(response);
                    $(".preloader ").css('display', 'none');
                    if (response.status == "success") {
                        app.toast('Successfully added cohort', {
                            actionColor: 'success'
                        });

                    } else {
                        app.toast('Failed to add  cohort', {
                            actionTitle: 'Failed',
                            actionColor: 'danger'
                        });

                    }
                    window.location.reload()

                }
            })
        }
    }
    function updateCohort(id) {
        if ($(".modal #name").val() == "") {
            app.toast('Please enter valid name', {
                actionTitle: 'Validation',
                actionColor: 'info'
            });
        } else {
            $(".preloader ").css('display', '');
            $.ajax({
                url: `<?=base_url('update-cohort')?>`,
                type: 'POST',
                data: {
                    cohort: id,
                    name: $(".modal #name").val(),
                    status: $(".modal #status").val(),
                },
                success: function (response) {
                    response = JSON.parse(response);
                    $(".preloader ").css('display', 'none');
                    if (response.status == "success") {
                        app.toast('Successfully updated cohort', {
                            actionColor: 'success'
                        });

                    } else {
                        app.toast('Failed to update  cohort', {
                            actionTitle: 'Failed',
                            actionColor: 'danger'
                        });

                    }
                    window.location.reload()

                }
            })
        }
    }
</script>
<?php if ($this->router->class == 'teacher'): ?>
	<?php if ($this->router->method === 'home'): ?>
        <script src="<?= base_url() ?>/assets/js/simplemde.min.js"></script>
        <script>
            this.board = {
                editors: {},
                data: {
                    weekly_lessons: {
                        url: '',
                        beginner_students: '',
                        advance_students: '',
                        announcements: '',
                    },
                    weekly_tasks: {
                        beginner_students: '',
                        advance_students: '',
                        announcements: '',
                    },

                    group_work: {
                        work_title: '',
                        work_description: '',
                        url: '',
                        weekly_work: '',
                    },
                    group_activity: {

                        work_title: '',
                        work_description: '',

                    },

                },
                syncProcess: false,
                sync: () => {
                    this.board.syncProcess = true
                    console.log('Sync Start')
                    for (let _section in this.board.data) {
                        if (this.board.data.hasOwnProperty(_section)) {
                            for (let _field in this.board.data[_section]) {
                                if (this.board.data[_section].hasOwnProperty(_field)) {
                                    if (this.board.editors[_section] !== undefined && this.board.editors[_section][_field] !== undefined) {
                                        console.log(`Editor found => ${_field}`)
                                        this.board.data[_section][_field] = this.board.editors[_section][_field].value()
                                    } else if ($(`[parent-section=${_section}] [component=${_field}]`).length > 0) {
                                        this.board.data[_section][_field] = $(`[parent-section=${_section}] [component=${_field}]`).val()
                                    } else {
                                        this.board.data[_section][_field] = '';
                                    }
                                }
                            }
                        }
                    }
                    this.board.syncProcess = false
                    console.log('Sync End')
                },
                uploadWork: (params, useraction = false) => {
                    if($("#cohort_list").val()  == ""){
                        app.toast('Please select valid cohort', {
                            actionTitle: 'Failed',

                            actionColor: 'danger'
                        });
                        return;
                    }
                    this.board.sync()
                    params.cohort=$("#cohort_list").val();
                    const data = 	Object.assign({}, this.board.data, params);
                   
                  
                    $(".preloader ").css('display', '');
                    $.ajax({
                        url: `<?=base_url('upload-work')?>`,
                        type: 'POST',
                        data: data,
                        success: function (response) {
                            response = JSON.parse(response);
                            $(".preloader ").css('display', 'none');
                            if (response.status == "success") {
                                if (useraction !== false) {
                                    app.toast('Successfully saved work', {
                                        actionTitle: useraction,
                                        actionUrl: '<?=base_url('/')?>',
                                        actionColor: 'success'
                                    });
                                }

                            } else if (response.status == "loginerr") {
                                app.toast('You are not authorized, Please login', {
                                    actionTitle: 'Login Error',
                                    actionUrl: '<?=base_url('/')?>',
                                    actionColor: 'danger'
                                });

                            } else {
                                app.toast('Failed to upload work', {
                                    actionTitle: 'Failed',

                                    actionColor: 'danger'
                                });
                            }


                        }
                    })
                },
                clearData: () => {

                    $(".preloader ").css('display', '');
                    $.ajax({
                        url: `<?=base_url('clear-board')?>`,
                        type: 'POST',
                        data: {},
                        success: function (response) {
                            response = JSON.parse(response);
                            $(".preloader ").css('display', 'none');
                            if (response.status == "success") {
                                app.toast('Successfully Cleared work', {
                                    actionColor: 'success'
                                });
                                window.location.reload()
                            } else if (response.status == "loginerr") {
                                app.toast('You are not authorized, Please login', {
                                    actionTitle: 'Login Error',
                                    actionUrl: '<?=base_url('/')?>',
                                    actionColor: 'danger'
                                });

                            } else {
                                app.toast('Failed to clear work', {
                                    actionTitle: 'Failed',
                                    actionColor: 'danger'
                                });
                            }


                        }
                    })
                }
            }
            $(document).ready(() => {
                if ($(".bg-text-area").length > 0) {
                    $(".bg-text-area").each(function () {
                        let _iDe = new SimpleMDE({
                            autofocus: false,
                            element: $(this)[0],
                            // autosave: {
                            // 	enabled: true,
                            // 	delay: 1000,
                            // },
                            placeholder: "Type here...",
                            spellChecker: true,
                            hideIcons: ["guide", "quote", "unordered-list", "link", "image"],
                        });
                        if (window.board.editors[$(this).attr('section')] === undefined) {
                            window.board.editors[$(this).attr('section')] = {};
                        }
                        window.board.editors[$(this).attr('section')][$(this).attr('component')] = _iDe
                    });
                }
                $("#cohort_list").click(()=>{
                    if($("#cohort_list").val() !== "" && $("#cohort_list").val() != undefined){
                        window.location.href=`<?=base_url('home/')?>${$("#cohort_list").val()}`
                    }
                })
                $(".board-label").click((e)=>{
                    let _elem=$(e.currentTarget),
                        _label=_elem.attr('board-label-for');
                    if(_label !== ""){
                        if($(`input[board-label=${_label}]`).val() !== ""){
                            $(".preloader ").css('display', 'flex');
                            $.ajax({
                                url: `<?=base_url('update-board-label')?>`,
                                type: 'POST',
                                data: {
                                    value:$(`input[board-label=${_label}]`).val(),
                                    field:_label,
                                    cohort:'<?=$selected_cohort?>'
                                },
                                success: function (response) {
                                    response = JSON.parse(response);
                                    $(".preloader ").css('display', 'none');
                                    if (response.status == "success") {
                                        app.toast('Successfully updated label', {
                                            actionTitle: 'Success',
                                            actionUrl: '<?=base_url('/')?>',
                                            actionColor: 'success'
                                        });

                                    } else if (response.status == "loginerr") {
                                        app.toast('You are not authorized, Please login', {
                                            actionTitle: 'Login Error',
                                            actionUrl: '<?=base_url('/')?>',
                                            actionColor: 'danger'
                                        });

                                    } else {
                                        app.toast('Failed to update label', {
                                            actionTitle: 'Failed',

                                            actionColor: 'danger'
                                        });
                                    }


                                }
                            })
                        }
                        else{
                            app.toast('Please enter valid label', {
                                actionTitle: 'Validation',
                                actionColor: 'info'
                            });
                        }
                    }
                    
                })
            })

            // setInterval(()=>{
            // 	this.board.uploadWork()
            // },60000)

            function user_action(status, action) {
                this.board.uploadWork({
                    useraction: status
                }, action)
            }

            function clear_all_data(status, action) {
                this.board.clearData()
            }

            $(".sub-modal").click((_e) => {
                this.board.sync()
                let _elem = $(_e.currentTarget);
                app.modaler({
                    url: `<?=base_url('email-content')?>?content=${_elem.attr('component')}&section=${_elem.attr('section')}`,
                    type: 'center',
                    size: 'w-500px',
                    title: _elem.attr('title'),
                    confirmVisible: false,
                    onCancel: function (modal) {
                        app.toast('You canceled it!');
                    }
                });
            })


            function send_email(section) {
                if ($(".modal #txtemail").val() == "") {
                    app.toast('Please enter valid email', {
                        actionTitle: 'Validation',
                        actionColor: 'info'
                    });
                } else {
                    if (section == "group_activity") {
                        let data = {
                            work_title: this.board.data.group_activity.work_title,
                            work_description: this.board.editors.group_activity.work_description.options.previewRender(this.board.editors.group_activity.work_description.value())
                        };
                        processEmail(data, section);
                    }
                    if (section == "weekly_tasks") {
                        let data = {
                            beginner_students: this.board.editors.weekly_tasks.beginner_students.options.previewRender(this.board.editors.weekly_tasks.beginner_students.value()),
                            advance_students: this.board.editors.weekly_tasks.advance_students.options.previewRender(this.board.editors.weekly_tasks.advance_students.value()),
                            announcements: this.board.editors.weekly_tasks.announcements.options.previewRender(this.board.editors.weekly_tasks.announcements.value())
                        };
                        processEmail(data, section);
                    }
                }
            }

            function processEmail(data, section) {
                $(".preloader ").css('display', '');
                $.ajax({
                    url: `<?=base_url('send-email')?>`,
                    type: 'POST',
                    data: {
                        content: data,
                        section: section,
                        email: $(".modal #txtemail").val(),
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        $(".preloader ").css('display', 'none');
                        if (response.status == "success") {
                            app.toast('Successfully sent email', {
                                actionColor: 'success'
                            });

                        } else {
                            app.toast('Failed to send email', {
                                actionTitle: 'Failed',
                                actionColor: 'danger'
                            });
                        }


                    }
                })
            }
			<?php if(!empty($this->session->userdata['from_sso'])): ?>
            this.board.sync()
            app.modaler({
                url: `<?=base_url('email-content')?>?section=<?=$this->session->userdata['sso_section']?>&navigation=direct`,
                type: 'center',
                size: 'w-800px',
                title: 'Connect With Google',
                confirmVisible: false,
                onCancel: function (modal) {
                    app.toast('You canceled it!');
                }
            });
			<?php endif; ?>
            function addToCalender(section, id) {
                if ($(".modal #dt-picker").val() == "") {
                    app.toast('Please select valid date', {
                        actionTitle: 'Validation',
                        actionColor: 'info'
                    });
                } else {
                    if (section == "group_activity") {
                        let data = {
                            calender: id,
                            work_title: this.board.data.group_activity.work_title,
                            work_description: this.board.editors.group_activity.work_description.value()
                        };
                        addCalenderData(data, section);
                    }
                    if (section == "weekly_tasks") {
                        let data = {
                            calender: id,
                            beginner_students: (this.board.editors.weekly_tasks.beginner_students.value()),
                            advance_students: (this.board.editors.weekly_tasks.advance_students.value()),
                            announcements: (this.board.editors.weekly_tasks.announcements.value())
                        };
                        addCalenderData(data, section);
                    }
                }
            }

            function addCalenderData(data, section) {
                $(".preloader ").css('display', '');
                let timezone_offset_minutes = new Date().getTimezoneOffset();
                $.ajax({
                    url: `<?=base_url('add-to-calender')?>`,
                    type: 'POST',
                    data: {
                        content: data,
                        section: section,
                        date: $(".modal #dt-picker").val(),
                        timeoffset: timezone_offset_minutes == 0 ? 0 : -timezone_offset_minutes
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        $(".preloader ").css('display', 'none');
                        if (response.status == "success") {
                            app.toast('Successfully added to calender', {
                                actionColor: 'success'
                            });

                        } else if (response.msg != undefined) {
                            app.toast(response.msg, {
                                actionTitle: 'Failed',
                                actionColor: 'danger'
                            });
                            //window.location.reload()
                        } else {
                            app.toast('Failed to add in calender', {
                                actionTitle: 'Failed',
                                actionColor: 'danger'
                            });
                            window.location.reload()
                        }


                    }
                })
            }


            $(".upload-file").click((_e) => {
                let _elem = $(_e.currentTarget);
                $("#modal-upload-file").modal('show')
                $("#modal-upload-file #section").val(_elem.attr('section'))
            });

            function deleteFile(section, id) {
                $(".preloader ").css('display', '');
                $.ajax({
                    url: `<?=base_url('delete-file')?>`,
                    type: 'POST',
                    data: {
                        section: section,
                        publication: id,

                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        $(".preloader ").css('display', 'none');
                        if (response.status == "success") {
                            app.toast('File Deleted', {
                                actionColor: 'success'
                            });

                        } else {
                            app.toast('Failed to Delete file', {
                                actionTitle: 'Failed',
                                actionColor: 'danger'
                            });

                        }

                        window.location.reload()
                    }
                })
            }

        </script>
	<?php endif; ?>
	<?php if ($this->router->method === 'students'): ?>
        <script>
            $(document).ready(() => {
                $(".check-student-status").change((e) => {
                    const _elem = $(e.currentTarget);
                    if (_elem.val() == null || _elem.val() == "") {
                        app.toast('Failed to Update status', {
                            actionTitle: 'Failed',
                            actionColor: 'danger'
                        });
                        window.location.reload()
                    } else {
                        $(".preloader ").css('display', '');
                        $.ajax({
                            url: `<?=base_url('update-status')?>`,
                            type: 'POST',
                            data: {
                                student: _elem.val(),
                                status: _elem.is(':checked'),
                            },
                            success: function (response) {
                                response = JSON.parse(response);
                                $(".preloader ").css('display', 'none');
                                if (response.status == "success") {
                                    app.toast('Successfully Updated Status', {
                                        actionColor: 'success'
                                    });

                                } else {
                                    app.toast('Failed to update status', {
                                        actionTitle: 'Failed',
                                        actionColor: 'danger'
                                    });
                                }
                                window.location.reload()


                            }
                        })
                    }
                })
            })

            function deleteStudent(id) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-secondary',
                    buttonsStyling: false
                }).then(function () {
                    $(".preloader ").css('display', '');
                    $.ajax({
                        url: `<?=base_url('delete-student')?>`,
                        type: 'POST',
                        data: {
                            student: id,
                        },
                        success: function (response) {
                            response = JSON.parse(response);
                            $(".preloader ").css('display', 'none');
                            if (response.status == "success") {
                                app.toast('Successfully deleted', {
                                    actionColor: 'success'
                                });

                            } else {
                                app.toast('Failed to delete student', {
                                    actionTitle: 'Failed',
                                    actionColor: 'danger'
                                });
                            }
                            window.location.reload()


                        }
                    })
                }, function (dismiss) {


                })
            }
        </script>
	<?php endif; ?>
	<?php if ($this->router->method === 'upload_class_work'): ?>
        <script>
            $(document).ready(() => {
                $("#save").click((e) => {
                    const _elem = $(e.currentTarget);
                    if ($("#class").val() == null || $("#class").val() == "") {
                        app.toast('Please select valid class', {
                            actionTitle: 'Failed',
                            actionColor: 'danger'
                        });
                        window.location.reload()
                    } else {
                        $(".preloader ").css('display', '');
                        $.ajax({
                            url: `<?=base_url('save-class-work')?>`,
                            type: 'POST',
                            data: {
                                class: $("#class").val() ,
                                data: $('#classwork').summernote('code')
                            },
                            success: function (response) {
                                response = JSON.parse(response);
                                $(".preloader ").css('display', 'none');
                                if (response.status == "success") {
                                    app.toast('Successfully Updated Status', {
                                        actionColor: 'success'
                                    });

                                } else {
                                    app.toast('Failed to update status', {
                                        actionTitle: 'Failed',
                                        actionColor: 'danger'
                                    });
                                }
                                window.location.reload()


                            }
                        })
                    }
                })
            })

            
        </script>
	<?php endif; ?>
	<?php if ($this->router->method === 'add_task'): ?>
        <script>
            $(document).ready(() => {
                $('.repeater').repeater({
                    isFirstItemUndeletable: true
                })
                $("#save").click((e) => {
                    const repTask = $('.repeater').repeaterVal();
                    let tasks = [];
                    $.each(repTask.task_list,(i,v)=>{
                        if(v.task!==""){
                            tasks.push(v.task)
                        }
                    })
                  
                    if (tasks.length  == 0) {
                        app.toast('Tasks cannot be empty', {
                            actionTitle: 'Failed',
                            actionColor: 'danger'
                        });
                       
                    } else {
                        $(".preloader ").css('display', '');
                        $.ajax({
                            url: `<?=base_url('save-task')?>`,
                            type: 'POST',
                            data: {
                                class: $("#class").val() ,
                                student: $("#student").val() ,
                                cohort: $("#cohort").val() ,
                                completion_level: $("#completion_level").val() ,
                                tasks: tasks
                            },
                            success: function (response) {
                                response = JSON.parse(response);
                                $(".preloader ").css('display', 'none');
                                if (response.status == "success") {
                                    app.toast('Successfully added task', {
                                        actionColor: 'success'
                                    });

                                } else {
                                    app.toast('Failed to add task', {
                                        actionTitle: 'Failed',
                                        actionColor: 'danger'
                                    });
                                }
                                window.location.reload()


                            }
                        })
                    }
                })
            })

            
        </script>
	<?php endif; ?>
<?php endif; ?>
<?php if ($this->router->class == 'Std_Class'): ?>
	<?php if ($this->router->method === 'index'): ?>
        <script>
            function deleteClass(id) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-secondary',
                    buttonsStyling: false
                }).then(function () {
                    $(".preloader ").css('display', '');
                    $.ajax({
                        url: `<?=base_url('delete-class')?>`,
                        type: 'POST',
                        data: {
                            class: id,
                        },
                        success: function (response) {
                            response = JSON.parse(response);
                            $(".preloader ").css('display', 'none');
                            if (response.status == "success") {
                                app.toast('Successfully class', {
                                    actionColor: 'success'
                                });

                            } else {
                                app.toast('Failed to delete class', {
                                    actionTitle: 'Failed',
                                    actionColor: 'danger'
                                });
                            }
                            window.location.reload()


                        }
                    })
                }, function (dismiss) {


                })
            }

         
            function updateClass(id) {
                if ($(".modal #name").val() == "") {
                    app.toast('Please enter valid name', {
                        actionTitle: 'Validation',
                        actionColor: 'info'
                    });
                } else {
                    $(".preloader ").css('display', '');
                    $.ajax({
                        url: `<?=base_url('update-class')?>`,
                        type: 'POST',
                        data: {
                            class: id,
                            name: $(".modal #name").val(),
                            status: $(".modal #status").val(),
                        },
                        success: function (response) {
                            response = JSON.parse(response);
                            $(".preloader ").css('display', 'none');
                            if (response.status == "success") {
                                app.toast('Successfully updated class', {
                                    actionColor: 'success'
                                });

                            } else {
                                app.toast('Failed to update  class', {
                                    actionTitle: 'Failed',
                                    actionColor: 'danger'
                                });

                            }
                            window.location.reload()

                        }
                    })
                }
            }
            
        </script>
	<?php endif; ?>

<?php endif; ?>
</body>
</html>

