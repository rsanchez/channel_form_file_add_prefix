# SafeCracker File - Add Prefix to Filename #

Add a prefix to the filename of SafeCracker File field in a SafeCracker form.

## Installation

* Copy the /system/expressionengine/third_party/safecracker_file_add_prefix/ folder to your /system/expressionengine/third_party/ folder

## Usage
Add a field to your SafeCracker form, whose name is your SafeCracker File field name with _prefix at the end.

	{exp:safecracker channel="site" return="my/form/ENTRY_ID"}
		<input type="hidden" name="my_file_field_prefix" value="{username}_">
	{/exp:safecracker}