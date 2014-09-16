# Channel Form - Add Prefix to Filename

Add a prefix to the filename of [File field](https://ellislab.com/expressionengine/user-guide/add-ons/channel/custom_fields.html#file-field) in a [Channel Form](https://ellislab.com/expressionengine/user-guide/add-ons/channel/channel_form/).

## Installation

* Copy the /system/expressionengine/third_party/channel_form_file_add_prefix/ folder to your /system/expressionengine/third_party/ folder

## Usage
Add a field to your Channel Field form, whose name is your File field name with _prefix at the end.

	{exp:channel:form channel="site" return="my/form/ENTRY_ID"}
		<input type="hidden" name="my_file_field_prefix" value="{username}_">
	{/exp:channel:form}