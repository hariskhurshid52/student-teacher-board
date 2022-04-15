<?php
	/**
	 * footer.php
	 * Developer: Haris
	 * Date: 2/5/2022
	 * Time: 01:36
	 */
?>


<!-- Scripts -->
<script src="<?= base_url() ?>/assets/theme/assets/js/core.min.js"></script>
<script src="<?= base_url() ?>/assets/theme/assets/js/app.min.js"></script>
<script src="<?= base_url() ?>/assets/theme/assets/js/script.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<?php if ($this->router->class == 'student'): ?>
    <script>
        $(".edit-profile").click(()=>{
            app.modaler({
                url: `<?=base_url('update-profile-content')?>`,
                type: 'center',
                title: 'Update Profile',
                confirmVisible: false,
                onCancel: function (modal) {
                    app.toast('You canceled it!');
                }
            });

        })
    </script>
	<?php if ($this->router->method === 'board'): ?>
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
                    this.board.sync()
                    const data = Object.assign({}, this.board.data, params)
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
                            toolbar: false,
                            toolbarTips: false,
                            spellChecker: true,

                        });
                        _iDe.togglePreview();
                        if (window.board.editors[$(this).attr('section')] === undefined) {
                            window.board.editors[$(this).attr('section')] = {};
                        }
                        window.board.editors[$(this).attr('section')][$(this).attr('component')] = _iDe
                    });
                }
            })
            $(".sub-modal").click((_e) => {
                this.board.sync()
                let _elem = $(_e.currentTarget);
                app.modaler({
                    url: `<?=base_url('email-content')?>?content=${_elem.attr('component')}&section=${_elem.attr('section')}`,
                    type: 'center',
                    size: 'w-800px',
                    title: _elem.attr('title'),
                    confirmVisible: false,
                    onCancel: function (modal) {
                        app.toast('You canceled it!');
                    }
                });
            })
			
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
                    else if (section == "weekly_tasks") {
                        let data = {
                            beginner_students: this.board.editors.weekly_tasks.beginner_students.options.previewRender(this.board.editors.weekly_tasks.beginner_students.value()),
                            advance_students: this.board.editors.weekly_tasks.advance_students.options.previewRender(this.board.editors.weekly_tasks.advance_students.value()),
                            announcements: this.board.editors.weekly_tasks.announcements.options.previewRender(this.board.editors.weekly_tasks.announcements.value())
                        };
                        processEmail(data, section);
                    }
                    else if(section == "notepad"){
                        let data = {
                            notepad: $('#mynotepad').summernote('code')
                            
                        };
                        processEmail(data, section);
                    }
                }
            }

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
            
            function save_notepad(){
                $.ajax({
                    url: `<?=base_url('save-notepad')?>`,
                    type: 'POST',
                    data: {
                        note_pad: $('#mynotepad').summernote('code'),
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        $(".preloader ").css('display', 'none');
                        if (response.status == "success") {
                            app.toast('Successfully saved notepad', {
                                actionColor: 'success'
                            });

                        }  else {
                            app.toast('Failed to save notepad', {
                                actionTitle: 'Failed',
                                actionColor: 'danger'
                            });
                           // window.location.reload()
                        }


                    }
                })
            }

            
        </script>
	<?php endif; ?>
	<?php if ($this->router->method === 'my_class_work'): ?>
        <script>
            $(document).ready(() => {
                $(".preloader ").css('display', '');
                setTimeout(()=>{
                    $(".preloader ").css('display', 'none');
                    $('#classwork').summernote('disable')
                },300)
            })


        </script>
	<?php endif; ?>
<?php endif; ?>
</body>
</html>

