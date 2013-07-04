<div>
	<form>
		<h1>Respondez Si Vous Plait!</h1>
		<h4>(Please, fill out the form for each person individually)</h4>
		<table>
		<tr>
			<td class='rsvp_text'>First Name</td>
			<td><div class="control-group" id='first_name'><input type='text' name='first_name' class='rsvp_form' id='rsvp_first'/></div></td>
		</tr>
		<tr>
			<td class='rsvp_text'>Last Name</td>
			<td><div class="control-group" id='last_name'><input type='text' name='last_name' class='rsvp_form'/></div></td>
		</tr>
		<tr>
			<td class='rsvp_text'>Email</td>
			<td><div class="control-group" id='email'><input type='text' name='email' class='rsvp_form'/></div></td>
		</tr>
		<tr>
			<td class='rsvp_text'>Address</td>
			<td><input type='text' name='address' class='rsvp_form'/></td>
		</tr>
		</table>
		<span class='rsvp_text'>Will you be attending?</span><br>
		<input type="radio" name="status" value="1" checked>  Yes<br>
		<input type="radio" name="status" value="0" > No<br><br>
		<span class='rsvp_text'>Message</span><br>
		<textarea name='message' class='rsvp_form'></textarea><br>
		<button class='btn rsvp_submit'>Submit</button>
	</form>
	<div id="rsvp_status"></div>
</div>