<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Special domain model class for direct mail records.
 */
class SysDmail extends AbstractEntity
{
    /**
     * @var int
     */
    protected $type = 0;

    /**
     * @var int
     */
    protected $page = 0;

    /**
     * @var string
     */
    protected $subject = '';

    /**
     * @var string
     */
    protected $fromEmail = '';

    /**
     * @var string
     */
    protected $fromName = '';

    /**
     * @var string
     */
    protected $replytoEmail = '';

    /**
     * @var string
     */
    protected $replytoName = '';

    /**
     * @var string
     */
    protected $organisation = '';

    /**
     * @var int
     */
    protected $priority = 3;

    /**
     * @var string
     */
    protected $encoding = 'quoted-printable';

    /**
     * @var string
     */
    protected $charset = 'utf-8';

    /**
     * sendOptions
     * 3 is default value as defined in TCA of direct_mail
     *
     * @var int
     */
    protected $sendOptions = 3;

    /**
     * @var int
     */
    protected $includeMedia = 0;

    /**
     * @var int
     */
    protected $flowedFormat = 0;

    /**
     * @var string
     */
    protected $htmlparams = '';

    /**
     * @var string
     */
    protected $plainparams = '&type=99';

    /**
     * @var bool
     */
    protected $issent = false;

    /**
     * @var int
     */
    protected $renderedsize = 0;

    /**
     * @var string
     */
    protected $mailcontent = '';

    /**
     * @var int
     */
    protected $scheduled = 0;

    /**
     * @var string
     */
    protected $queryInfo = '';

    /**
     * @var int
     */
    protected $scheduledBegin = 0;

    /**
     * @var int
     */
    protected $scheduledEnd = 0;

    /**
     * @var string
     */
    protected $returnPath = '';

    /**
     * @var bool
     */
    protected $useDomain = true;

    /**
     * @var bool
     */
    protected $useRdct = true;

    /**
     * @var string
     */
    protected $longLinkRdctUrl = '';

    /**
     * @var bool
     */
    protected $longLinkMode = true;

    /**
     * @var string
     */
    protected $authcodeFieldlist = '';

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return SysDmail
     */
    public function setType(int $type): SysDmail
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return SysDmail
     */
    public function setPage(int $page): SysDmail
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return SysDmail
     */
    public function setSubject(string $subject): SysDmail
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromEmail(): string
    {
        return $this->fromEmail;
    }

    /**
     * @param string $fromEmail
     * @return SysDmail
     */
    public function setFromEmail(string $fromEmail): SysDmail
    {
        $this->fromEmail = $fromEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromName(): string
    {
        return $this->fromName;
    }

    /**
     * @param string $fromName
     * @return SysDmail
     */
    public function setFromName(string $fromName): SysDmail
    {
        $this->fromName = $fromName;
        return $this;
    }

    /**
     * @return string
     */
    public function getReplytoEmail(): string
    {
        return $this->replytoEmail;
    }

    /**
     * @param string $replytoEmail
     * @return SysDmail
     */
    public function setReplytoEmail(string $replytoEmail): SysDmail
    {
        $this->replytoEmail = $replytoEmail;
        $this->returnPath = $replytoEmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getReplytoName(): string
    {
        return $this->replytoName;
    }

    /**
     * @param string $replytoName
     * @return SysDmail
     */
    public function setReplytoName(string $replytoName): SysDmail
    {
        $this->replytoName = $replytoName;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrganisation(): string
    {
        return $this->organisation;
    }

    /**
     * @param string $organisation
     * @return SysDmail
     */
    public function setOrganisation(string $organisation): SysDmail
    {
        $this->organisation = $organisation;
        return $this;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     * @return SysDmail
     */
    public function setPriority(int $priority): SysDmail
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return string
     */
    public function getEncoding(): string
    {
        return $this->encoding;
    }

    /**
     * @param string $encoding
     * @return SysDmail
     */
    public function setEncoding(string $encoding): SysDmail
    {
        $this->encoding = $encoding;
        return $this;
    }

    /**
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     * @return SysDmail
     */
    public function setCharset(string $charset): SysDmail
    {
        $this->charset = $charset;
        return $this;
    }

    /**
     * @return int
     */
    public function getSendOptions(): int
    {
        return $this->sendOptions;
    }

    /**
     * @param int $sendOptions
     * @return SysDmail
     */
    public function setSendOptions(int $sendOptions): SysDmail
    {
        $this->sendOptions = $sendOptions;
        return $this;
    }

    /**
     * @return int
     */
    public function getIncludeMedia(): int
    {
        return $this->includeMedia;
    }

    /**
     * @param int $includeMedia
     * @return SysDmail
     */
    public function setIncludeMedia(int $includeMedia): SysDmail
    {
        $this->includeMedia = $includeMedia;
        return $this;
    }

    /**
     * @return int
     */
    public function getFlowedFormat(): int
    {
        return $this->flowedFormat;
    }

    /**
     * @param int $flowedFormat
     * @return SysDmail
     */
    public function setFlowedFormat(int $flowedFormat): SysDmail
    {
        $this->flowedFormat = $flowedFormat;
        return $this;
    }

    /**
     * @return string
     */
    public function getHtmlparams(): string
    {
        return $this->htmlparams;
    }

    /**
     * @param string $htmlparams
     * @return SysDmail
     */
    public function setHtmlparams(string $htmlparams): SysDmail
    {
        $this->htmlparams = $htmlparams;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlainparams(): string
    {
        return $this->plainparams;
    }

    /**
     * @param string $plainparams
     * @return SysDmail
     */
    public function setPlainparams(string $plainparams): SysDmail
    {
        $this->plainparams = $plainparams;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIssent(): bool
    {
        return $this->issent;
    }

    /**
     * @param bool $issent
     * @return SysDmail
     */
    public function setIssent(bool $issent): SysDmail
    {
        $this->issent = $issent;
        return $this;
    }

    /**
     * @return int
     */
    public function getRenderedsize(): int
    {
        return $this->renderedsize;
    }

    /**
     * @param int $renderedsize
     * @return SysDmail
     */
    public function setRenderedsize(int $renderedsize): SysDmail
    {
        $this->renderedsize = $renderedsize;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailcontent(): string
    {
        return $this->mailcontent;
    }

    /**
     * @param string $mailcontent
     * @return SysDmail
     */
    public function setMailcontent(string $mailcontent): SysDmail
    {
        $this->mailcontent = $mailcontent;
        $this->renderedsize = strlen($mailcontent);
        return $this;
    }

    /**
     * @return int
     */
    public function getScheduled(): int
    {
        return $this->scheduled;
    }

    /**
     * @param int $scheduled
     * @return SysDmail
     */
    public function setScheduled(int $scheduled): SysDmail
    {
        $this->scheduled = $scheduled;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueryInfo(): string
    {
        return $this->queryInfo;
    }

    /**
     * @param string $queryInfo
     * @return SysDmail
     */
    public function setQueryInfo(string $queryInfo): SysDmail
    {
        $this->queryInfo = $queryInfo;
        return $this;
    }

    /**
     * @return int
     */
    public function getScheduledBegin(): int
    {
        return $this->scheduledBegin;
    }

    /**
     * @param int $scheduledBegin
     * @return SysDmail
     */
    public function setScheduledBegin(int $scheduledBegin): SysDmail
    {
        $this->scheduledBegin = $scheduledBegin;
        return $this;
    }

    /**
     * @return int
     */
    public function getScheduledEnd(): int
    {
        return $this->scheduledEnd;
    }

    /**
     * @param int $scheduledEnd
     * @return SysDmail
     */
    public function setScheduledEnd(int $scheduledEnd): SysDmail
    {
        $this->scheduledEnd = $scheduledEnd;
        return $this;
    }

    /**
     * @return string
     */
    public function getReturnPath(): string
    {
        return $this->returnPath;
    }

    /**
     * @param string $returnPath
     * @return SysDmail
     */
    public function setReturnPath(string $returnPath): SysDmail
    {
        $this->returnPath = $returnPath;
        return $this;
    }

    /**
     * @return bool
     */
    public function getUseDomain(): bool
    {
        return $this->useDomain;
    }

    /**
     * @param bool $useDomain
     * @return SysDmail
     */
    public function setUseDomain(bool $useDomain): SysDmail
    {
        $this->useDomain = $useDomain;
        return $this;
    }

    /**
     * @return bool
     */
    public function getUseRdct(): bool
    {
        return $this->useRdct;
    }

    /**
     * @param bool $useRdct
     * @return SysDmail
     */
    public function setUseRdct(bool $useRdct): SysDmail
    {
        $this->useRdct = $useRdct;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongLinkRdctUrl(): string
    {
        return $this->longLinkRdctUrl;
    }

    /**
     * @param string $longLinkRdctUrl
     * @return SysDmail
     */
    public function setLongLinkRdctUrl(string $longLinkRdctUrl): SysDmail
    {
        $this->longLinkRdctUrl = $longLinkRdctUrl;
        return $this;
    }

    /**
     * @return bool
     */
    public function getLongLinkMode(): bool
    {
        return $this->longLinkMode;
    }

    /**
     * @param bool $longLinkMode
     * @return SysDmail
     */
    public function setLongLinkMode(bool $longLinkMode): SysDmail
    {
        $this->longLinkMode = $longLinkMode;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthcodeFieldlist(): string
    {
        return $this->authcodeFieldlist;
    }

    /**
     * @param string $authcodeFieldlist
     * @return SysDmail
     */
    public function setAuthcodeFieldlist(string $authcodeFieldlist): SysDmail
    {
        $this->authcodeFieldlist = $authcodeFieldlist;
        return $this;
    }
}
