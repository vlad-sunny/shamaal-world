<?php

session_start( );
if ( isset( $player['text'] ) )
{
    $text = $player['text'];
}
echo "<meta content=\"text/html; charset=utf-8\" http-equiv=\"Content-Type\">\r\n\r\n<LINK REL=STYLESHEET TYPE=\"TEXT/CSS\" HREF=\"style.css\" TITLE=\"STYLE\">\r\n";
echo '<script type="text/javascript" src="jquery.min.js"></script>';
echo "\r\n";
echo '<script type="text/javascript" src="jquery-ui.min.js"></script>';
echo "\r\n";
echo '<script type="text/javascript" src="jquery.cookie.js"></script>';
echo "\r\n";
echo "<script>
	function setattr(n,isopen)
	{
		if (isopen == 1)
		{
		    top.toppertext[n] = $(\"#delall\" + n)[0].outerHTML;
			$(\"#delall\" + n).replaceWith(top.topper[n]);
        }
		if (isopen == 2)
		{
			$(\"#delall\" + n).replaceWith(top.toppertext[n]);
		}
	}

	s = top.SkillText;
	document.write(s);

</script>\r\n";
echo "<body class=\"sortableAbility\"></body>";
echo '<script>
        $(document).ready(function ()
        {
            $("#skills-edit-button", window.parent.document).click(function() {
                // read saved configs
                var settings = top.readSkillsSettings();
/*                var settingsString = $.cookie("skillSet-");
                $(settingsString.split(";")).each(function () {
                    var abilityParts = this.split(":");
                    var abilityId = abilityParts[0];
                    var abilitySkillsString = abilityParts[1];

                    if (abilitySkillsString == "0") {
                        settings[abilityId] = abilitySkillsString;
                    }
                    else {
                        var skills = new Object();

                        $(abilitySkillsString.split("|")).each(function () {
                            if (this.match("^-")) {
                                skills[this.replace("-", "")] = "0";
                            }
                            else {
                                skills[this] = "1";
                            }
                        });

                        settings[abilityId] = skills;
                    }
                });*/

                // disable toggling
                $.each($("font[id^=\'del\']"), function ()
                {
                    var abilityId = $(this).attr("id").replace("del", "");
                    setattr(abilityId, 2);

                    // need to get this again after setattr
                    $("font[id^=\'del" + abilityId + "\']").empty();
                });

                //$(".skillsSortable").sortable({ disabled: false }).disableSelection();
                //$(".sortableAbility").sortable({ handle: ".ability-name", disabled: false }).disableSelection();

                $(".skill").attr("disabled", "disabled");

                $(this).hide();
                $("#skills-edit-cancel-button", window.parent.document).show();
                $("#skills-edit-save-button", window.parent.document).show();

                $("div[id^=\'delall\'], tr.mainb").show();

                $(".skills-buttons").each(function () {
                    var skillNameWidth = $(this).parent().find("td.skillname b").width();
                    $(this).find(">td").css("padding-left", skillNameWidth + "px");
                }).show();

                $(".abilities-disable-button").show();
                $(".abilities-disable-button").click(function() {
                    hideAbility(this);
                });

                $(".abilities-enable-button").click(function() {
                    showAbility(this);
                });

                $(".skills-disable-button").show();
                $(".skills-disable-button").click(function() {
                    hideSkill(this);
                });

                $(".skills-enable-button").click(function() {
                    showSkill(this);
                });

                // apply old settings
                $(".abilities-disable-button").each(function () {
                    var abilityId = $(this).data("ability-id");
                    if (settings[abilityId] !== undefined) {
                        if (settings[abilityId] == "0") {
                            hideAbility(this);
                        }
                        else {
                            $(this).parents("div[id^=\'delall\']").find(".skills-disable-button").each(function () {
                                var skillId = $(this).data("skill-id");
                                if (settings[abilityId][skillId] !== undefined) {
                                    if (settings[abilityId][skillId] == "0") {
                                        hideSkill(this);
                                    }
                                }
                            });
                        }
                    }
                });
            });

            $("#skills-edit-cancel-button", window.parent.document).click(function () {
                editorModeOff();
            });

            $("#skills-edit-save-button", window.parent.document).click(function () {
                // save skills
                var settingsArray = new Array();
                $("span.abilities-enable-button").each(function () {
                    var abilityVisibility = "0";
                    if (!$(this).is(":visible")) {
                        var skillsArray = new Array();
                        $(this).parents("div[id^=\'delall\']").find(".skills-enable-button").each(function () {
                            var skillId = $(this).data("skill-id");
                            if ($(this).is(":visible")) {
                                skillId = "-" + skillId;
                            }
                            skillsArray.push(skillId);
                        });

                        var skills = skillsArray.join("|");

                        if (skills != "") {
                            abilityVisibility = skills;
                        }
                    }

                    var abilityId = $(this).data("ability-id");
                    settingsArray.push(abilityId + ":" + abilityVisibility);
                });

                var date = new Date();
                date.setDate(date.getDate() + 365);
                $.cookie("skillSet-'.$player["id"].'", settingsArray.join(";"), { expires : date });

                editorModeOff();
            });

            function showAbility(abilityEnableButton) {
                $(abilityEnableButton).siblings(".abilities-disable-button").show();
                //$(this).parents("div[id^=\'delall\']").find(".skills-disable-button").show();
                $(abilityEnableButton).parents("div[id^=\'delall\']").find(".skillsSortable").show();
                $(abilityEnableButton).hide();
            }

            function hideAbility(abilityDisableButton) {
                $(abilityDisableButton).siblings(".abilities-enable-button").show();
                //$(this).parents("div[id^=\'delall\']").find(".skills-enable-button,.skills-disable-button").hide();
                $(abilityDisableButton).parents("div[id^=\'delall\']").find(".skillsSortable").hide();
//              $(this).parents("div[id^=\'delall\']").find(".skills-enable-button").each(function () {
//                  showSkill(this);
//              });
                $(abilityDisableButton).hide();
            }

            function showSkill(skillEnableButton) {
                $(skillEnableButton).siblings(".skills-disable-button").show();
                $(skillEnableButton).parents("tr.mainb").find("tr:not(.skills-buttons)").fadeTo("fast", 1.0);
                $(skillEnableButton).hide();
            }

            function hideSkill(skillDisableButton) {
                $(skillDisableButton).siblings(".skills-enable-button").show();
                $(skillDisableButton).parents("tr.mainb").find("tr:not(.skills-buttons)").fadeTo("fast", 0.2);
                $(skillDisableButton).hide();
            }

            function editorModeOff() {
                // enable toggling
                $("font[id^=\'del\']").each(function() {
                    var abilityId = $(this).attr("id").replace("del", "");
                    setattr(abilityId, 2);
                });

                $(".skill").removeAttr("disabled");

                // set new settings
                top.skillsSettings = top.readSkillsSettings();

                // apply hot changes
                var settings = top.readSkillsSettings();
                $("div[id^=\'delall\']").each(function () {
                    var abilityId = $(this).find(".abilities-disable-button").data("ability-id");
                    if (settings[abilityId] !== undefined) {
                        if (settings[abilityId] == "0") {
                            $(this).hide();
                        }
                        else {
                            $(this).show();
                            $(this).find("tr.mainb").each(function () {
                                var skillId = $(this).find(".skills-disable-button").data("skill-id");
                                if (settings[abilityId][skillId] !== undefined) {
                                    if (settings[abilityId][skillId] == "0") {
                                        $(this).hide();
                                    }
                                    else {
                                        $(this).show();
                                    }
                                }
                                else {
                                    $(this).show();
                                }
                            });
                        }
                    }
                    else {
                        $(this).show();
                    }
                });

                //$(".skillsSortable").sortable({ disabled: true }).enableSelection();
                //$(".sortableAbility").sortable({ disabled: true }).enableSelection();

                $("#skills-edit-button", window.parent.document).show();
                $("#skills-edit-cancel-button", window.parent.document).hide();
                $("#skills-edit-save-button", window.parent.document).hide();
            }
        });
      </script>';
?>
