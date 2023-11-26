<?php

namespace Aws\Chime;

use Aws\AwsClient;

/**
 * This client is used to interact with the **Amazon Chime** service.
 * @method \Aws\Result associatePhoneNumberWithUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePhoneNumberWithUserAsync(array $args = [])
 * @method \Aws\Result associatePhoneNumbersWithVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePhoneNumbersWithVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result associatePhoneNumbersWithVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associatePhoneNumbersWithVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result associateSigninDelegateGroupsWithAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise associateSigninDelegateGroupsWithAccountAsync(array $args = [])
 * @method \Aws\Result batchCreateAttendee(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateAttendeeAsync(array $args = [])
 * @method \Aws\Result batchCreateChannelMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateChannelMembershipAsync(array $args = [])
 * @method \Aws\Result batchCreateRoomMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchCreateRoomMembershipAsync(array $args = [])
 * @method \Aws\Result batchDeletePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchDeletePhoneNumberAsync(array $args = [])
 * @method \Aws\Result batchSuspendUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchSuspendUserAsync(array $args = [])
 * @method \Aws\Result batchUnsuspendUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUnsuspendUserAsync(array $args = [])
 * @method \Aws\Result batchUpdatePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdatePhoneNumberAsync(array $args = [])
 * @method \Aws\Result batchUpdateUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise batchUpdateUserAsync(array $args = [])
 * @method \Aws\Result createAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAccountAsync(array $args = [])
 * @method \Aws\Result createAppInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceAsync(array $args = [])
 * @method \Aws\Result createAppInstanceAdmin(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceAdminAsync(array $args = [])
 * @method \Aws\Result createAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result createAttendee(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createAttendeeAsync(array $args = [])
 * @method \Aws\Result createBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createBotAsync(array $args = [])
 * @method \Aws\Result createChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelAsync(array $args = [])
 * @method \Aws\Result createChannelBan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelBanAsync(array $args = [])
 * @method \Aws\Result createChannelMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelMembershipAsync(array $args = [])
 * @method \Aws\Result createChannelModerator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createChannelModeratorAsync(array $args = [])
 * @method \Aws\Result createMediaCapturePipeline(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMediaCapturePipelineAsync(array $args = [])
 * @method \Aws\Result createMeeting(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMeetingAsync(array $args = [])
 * @method \Aws\Result createMeetingDialOut(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMeetingDialOutAsync(array $args = [])
 * @method \Aws\Result createMeetingWithAttendees(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createMeetingWithAttendeesAsync(array $args = [])
 * @method \Aws\Result createPhoneNumberOrder(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createPhoneNumberOrderAsync(array $args = [])
 * @method \Aws\Result createProxySession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createProxySessionAsync(array $args = [])
 * @method \Aws\Result createRoom(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoomAsync(array $args = [])
 * @method \Aws\Result createRoomMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRoomMembershipAsync(array $args = [])
 * @method \Aws\Result createSipMediaApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSipMediaApplicationAsync(array $args = [])
 * @method \Aws\Result createSipMediaApplicationCall(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSipMediaApplicationCallAsync(array $args = [])
 * @method \Aws\Result createSipRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSipRuleAsync(array $args = [])
 * @method \Aws\Result createUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createUserAsync(array $args = [])
 * @method \Aws\Result createVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result createVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result deleteAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAccountAsync(array $args = [])
 * @method \Aws\Result deleteAppInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceAsync(array $args = [])
 * @method \Aws\Result deleteAppInstanceAdmin(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceAdminAsync(array $args = [])
 * @method \Aws\Result deleteAppInstanceStreamingConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceStreamingConfigurationsAsync(array $args = [])
 * @method \Aws\Result deleteAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result deleteAttendee(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteAttendeeAsync(array $args = [])
 * @method \Aws\Result deleteChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelAsync(array $args = [])
 * @method \Aws\Result deleteChannelBan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelBanAsync(array $args = [])
 * @method \Aws\Result deleteChannelMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelMembershipAsync(array $args = [])
 * @method \Aws\Result deleteChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelMessageAsync(array $args = [])
 * @method \Aws\Result deleteChannelModerator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteChannelModeratorAsync(array $args = [])
 * @method \Aws\Result deleteEventsConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteEventsConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteMediaCapturePipeline(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMediaCapturePipelineAsync(array $args = [])
 * @method \Aws\Result deleteMeeting(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteMeetingAsync(array $args = [])
 * @method \Aws\Result deletePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deletePhoneNumberAsync(array $args = [])
 * @method \Aws\Result deleteProxySession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteProxySessionAsync(array $args = [])
 * @method \Aws\Result deleteRoom(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoomAsync(array $args = [])
 * @method \Aws\Result deleteRoomMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRoomMembershipAsync(array $args = [])
 * @method \Aws\Result deleteSipMediaApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSipMediaApplicationAsync(array $args = [])
 * @method \Aws\Result deleteSipRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSipRuleAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorEmergencyCallingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorEmergencyCallingConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorOrigination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorOriginationAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorProxy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorProxyAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorStreamingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorStreamingConfigurationAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorTermination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorTerminationAsync(array $args = [])
 * @method \Aws\Result deleteVoiceConnectorTerminationCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteVoiceConnectorTerminationCredentialsAsync(array $args = [])
 * @method \Aws\Result describeAppInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceAsync(array $args = [])
 * @method \Aws\Result describeAppInstanceAdmin(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceAdminAsync(array $args = [])
 * @method \Aws\Result describeAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result describeChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelAsync(array $args = [])
 * @method \Aws\Result describeChannelBan(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelBanAsync(array $args = [])
 * @method \Aws\Result describeChannelMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelMembershipAsync(array $args = [])
 * @method \Aws\Result describeChannelMembershipForAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelMembershipForAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result describeChannelModeratedByAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelModeratedByAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result describeChannelModerator(array $args = [])
 * @method \GuzzleHttp\Promise\Promise describeChannelModeratorAsync(array $args = [])
 * @method \Aws\Result disassociatePhoneNumberFromUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePhoneNumberFromUserAsync(array $args = [])
 * @method \Aws\Result disassociatePhoneNumbersFromVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePhoneNumbersFromVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result disassociatePhoneNumbersFromVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociatePhoneNumbersFromVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result disassociateSigninDelegateGroupsFromAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise disassociateSigninDelegateGroupsFromAccountAsync(array $args = [])
 * @method \Aws\Result getAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountAsync(array $args = [])
 * @method \Aws\Result getAccountSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @method \Aws\Result getAppInstanceRetentionSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppInstanceRetentionSettingsAsync(array $args = [])
 * @method \Aws\Result getAppInstanceStreamingConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAppInstanceStreamingConfigurationsAsync(array $args = [])
 * @method \Aws\Result getAttendee(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getAttendeeAsync(array $args = [])
 * @method \Aws\Result getBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getBotAsync(array $args = [])
 * @method \Aws\Result getChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getChannelMessageAsync(array $args = [])
 * @method \Aws\Result getEventsConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getEventsConfigurationAsync(array $args = [])
 * @method \Aws\Result getGlobalSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getGlobalSettingsAsync(array $args = [])
 * @method \Aws\Result getMediaCapturePipeline(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMediaCapturePipelineAsync(array $args = [])
 * @method \Aws\Result getMeeting(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMeetingAsync(array $args = [])
 * @method \Aws\Result getMessagingSessionEndpoint(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getMessagingSessionEndpointAsync(array $args = [])
 * @method \Aws\Result getPhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberAsync(array $args = [])
 * @method \Aws\Result getPhoneNumberOrder(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberOrderAsync(array $args = [])
 * @method \Aws\Result getPhoneNumberSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getPhoneNumberSettingsAsync(array $args = [])
 * @method \Aws\Result getProxySession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getProxySessionAsync(array $args = [])
 * @method \Aws\Result getRetentionSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRetentionSettingsAsync(array $args = [])
 * @method \Aws\Result getRoom(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRoomAsync(array $args = [])
 * @method \Aws\Result getSipMediaApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipMediaApplicationAsync(array $args = [])
 * @method \Aws\Result getSipMediaApplicationLoggingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipMediaApplicationLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result getSipRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSipRuleAsync(array $args = [])
 * @method \Aws\Result getUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserAsync(array $args = [])
 * @method \Aws\Result getUserSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getUserSettingsAsync(array $args = [])
 * @method \Aws\Result getVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorEmergencyCallingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorEmergencyCallingConfigurationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorGroupAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorLoggingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorOrigination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorOriginationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorProxy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorProxyAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorStreamingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorStreamingConfigurationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorTermination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorTerminationAsync(array $args = [])
 * @method \Aws\Result getVoiceConnectorTerminationHealth(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getVoiceConnectorTerminationHealthAsync(array $args = [])
 * @method \Aws\Result inviteUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise inviteUsersAsync(array $args = [])
 * @method \Aws\Result listAccounts(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAccountsAsync(array $args = [])
 * @method \Aws\Result listAppInstanceAdmins(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceAdminsAsync(array $args = [])
 * @method \Aws\Result listAppInstanceUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstanceUsersAsync(array $args = [])
 * @method \Aws\Result listAppInstances(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAppInstancesAsync(array $args = [])
 * @method \Aws\Result listAttendeeTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttendeeTagsAsync(array $args = [])
 * @method \Aws\Result listAttendees(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listAttendeesAsync(array $args = [])
 * @method \Aws\Result listBots(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listBotsAsync(array $args = [])
 * @method \Aws\Result listChannelBans(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelBansAsync(array $args = [])
 * @method \Aws\Result listChannelMemberships(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelMembershipsAsync(array $args = [])
 * @method \Aws\Result listChannelMembershipsForAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelMembershipsForAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result listChannelMessages(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelMessagesAsync(array $args = [])
 * @method \Aws\Result listChannelModerators(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelModeratorsAsync(array $args = [])
 * @method \Aws\Result listChannels(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsAsync(array $args = [])
 * @method \Aws\Result listChannelsModeratedByAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listChannelsModeratedByAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result listMediaCapturePipelines(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listMediaCapturePipelinesAsync(array $args = [])
 * @method \Aws\Result listMeetingTags(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listMeetingTagsAsync(array $args = [])
 * @method \Aws\Result listMeetings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listMeetingsAsync(array $args = [])
 * @method \Aws\Result listPhoneNumberOrders(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumberOrdersAsync(array $args = [])
 * @method \Aws\Result listPhoneNumbers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listPhoneNumbersAsync(array $args = [])
 * @method \Aws\Result listProxySessions(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listProxySessionsAsync(array $args = [])
 * @method \Aws\Result listRoomMemberships(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoomMembershipsAsync(array $args = [])
 * @method \Aws\Result listRooms(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRoomsAsync(array $args = [])
 * @method \Aws\Result listSipMediaApplications(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSipMediaApplicationsAsync(array $args = [])
 * @method \Aws\Result listSipRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSipRulesAsync(array $args = [])
 * @method \Aws\Result listSupportedPhoneNumberCountries(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSupportedPhoneNumberCountriesAsync(array $args = [])
 * @method \Aws\Result listTagsForResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \Aws\Result listUsers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listUsersAsync(array $args = [])
 * @method \Aws\Result listVoiceConnectorGroups(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceConnectorGroupsAsync(array $args = [])
 * @method \Aws\Result listVoiceConnectorTerminationCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceConnectorTerminationCredentialsAsync(array $args = [])
 * @method \Aws\Result listVoiceConnectors(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listVoiceConnectorsAsync(array $args = [])
 * @method \Aws\Result logoutUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise logoutUserAsync(array $args = [])
 * @method \Aws\Result putAppInstanceRetentionSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putAppInstanceRetentionSettingsAsync(array $args = [])
 * @method \Aws\Result putAppInstanceStreamingConfigurations(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putAppInstanceStreamingConfigurationsAsync(array $args = [])
 * @method \Aws\Result putEventsConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putEventsConfigurationAsync(array $args = [])
 * @method \Aws\Result putRetentionSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putRetentionSettingsAsync(array $args = [])
 * @method \Aws\Result putSipMediaApplicationLoggingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putSipMediaApplicationLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorEmergencyCallingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorEmergencyCallingConfigurationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorLoggingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorLoggingConfigurationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorOrigination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorOriginationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorProxy(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorProxyAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorStreamingConfiguration(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorStreamingConfigurationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorTermination(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorTerminationAsync(array $args = [])
 * @method \Aws\Result putVoiceConnectorTerminationCredentials(array $args = [])
 * @method \GuzzleHttp\Promise\Promise putVoiceConnectorTerminationCredentialsAsync(array $args = [])
 * @method \Aws\Result redactChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise redactChannelMessageAsync(array $args = [])
 * @method \Aws\Result redactConversationMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise redactConversationMessageAsync(array $args = [])
 * @method \Aws\Result redactRoomMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise redactRoomMessageAsync(array $args = [])
 * @method \Aws\Result regenerateSecurityToken(array $args = [])
 * @method \GuzzleHttp\Promise\Promise regenerateSecurityTokenAsync(array $args = [])
 * @method \Aws\Result resetPersonalPIN(array $args = [])
 * @method \GuzzleHttp\Promise\Promise resetPersonalPINAsync(array $args = [])
 * @method \Aws\Result restorePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise restorePhoneNumberAsync(array $args = [])
 * @method \Aws\Result searchAvailablePhoneNumbers(array $args = [])
 * @method \GuzzleHttp\Promise\Promise searchAvailablePhoneNumbersAsync(array $args = [])
 * @method \Aws\Result sendChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise sendChannelMessageAsync(array $args = [])
 * @method \Aws\Result tagAttendee(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagAttendeeAsync(array $args = [])
 * @method \Aws\Result tagMeeting(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagMeetingAsync(array $args = [])
 * @method \Aws\Result tagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \Aws\Result untagAttendee(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagAttendeeAsync(array $args = [])
 * @method \Aws\Result untagMeeting(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagMeetingAsync(array $args = [])
 * @method \Aws\Result untagResource(array $args = [])
 * @method \GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \Aws\Result updateAccount(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountAsync(array $args = [])
 * @method \Aws\Result updateAccountSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAccountSettingsAsync(array $args = [])
 * @method \Aws\Result updateAppInstance(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceAsync(array $args = [])
 * @method \Aws\Result updateAppInstanceUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateAppInstanceUserAsync(array $args = [])
 * @method \Aws\Result updateBot(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateBotAsync(array $args = [])
 * @method \Aws\Result updateChannel(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelAsync(array $args = [])
 * @method \Aws\Result updateChannelMessage(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelMessageAsync(array $args = [])
 * @method \Aws\Result updateChannelReadMarker(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateChannelReadMarkerAsync(array $args = [])
 * @method \Aws\Result updateGlobalSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateGlobalSettingsAsync(array $args = [])
 * @method \Aws\Result updatePhoneNumber(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberAsync(array $args = [])
 * @method \Aws\Result updatePhoneNumberSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updatePhoneNumberSettingsAsync(array $args = [])
 * @method \Aws\Result updateProxySession(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateProxySessionAsync(array $args = [])
 * @method \Aws\Result updateRoom(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoomAsync(array $args = [])
 * @method \Aws\Result updateRoomMembership(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRoomMembershipAsync(array $args = [])
 * @method \Aws\Result updateSipMediaApplication(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSipMediaApplicationAsync(array $args = [])
 * @method \Aws\Result updateSipMediaApplicationCall(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSipMediaApplicationCallAsync(array $args = [])
 * @method \Aws\Result updateSipRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSipRuleAsync(array $args = [])
 * @method \Aws\Result updateUser(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserAsync(array $args = [])
 * @method \Aws\Result updateUserSettings(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateUserSettingsAsync(array $args = [])
 * @method \Aws\Result updateVoiceConnector(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceConnectorAsync(array $args = [])
 * @method \Aws\Result updateVoiceConnectorGroup(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateVoiceConnectorGroupAsync(array $args = [])
 */
class ChimeClient extends AwsClient
{
}
